#!/bin/bash

install_nuxt() {
  local INSTALL_DIRECTORY=src

  # Init a new Nuxt app into a temporary directory
  docker-compose -f docker-compose.dev.yml run --rm --no-deps \
    --user "$(id -u)":"$(id -g)" app \
    npx nuxi init ${INSTALL_DIRECTORY}

  # Set ownership of the temporary directory to the current user
  sudo chown -R "$(id -u)":"$(id -g)" ./${INSTALL_DIRECTORY}

  # Move everything from the temporary directory to the current directory
  mv ${INSTALL_DIRECTORY}/* ${INSTALL_DIRECTORY}/.* .

  # Remove the temporary directory
  rm -r ${INSTALL_DIRECTORY}
}

# Copy .env file
if [ ! -f ./.env ]; then
    cp ./.env.dev ./.env
fi

# Create shared gateway network
docker network create gateway

# Build containers
make build

# Install Nuxt framework
install_nuxt

# Install packages
docker-compose -f docker-compose.dev.yml run --rm --no-deps \
  --user "$(id -u)":"$(id -g)" app \
  yarn add vuetify@next sass vite-plugin-vuetify @fortawesome/fontawesome-free @mdi/font pinia @pinia/nuxt @nuxtjs/tailwindcss @tailwindcss/forms @headlessui/vue \
  yarn install

# Start containers
make up

# Print the final message
echo "The client app has been installed and run on http://localhost:3000."
