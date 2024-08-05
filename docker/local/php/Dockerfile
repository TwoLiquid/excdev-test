FROM php:8.2-fpm

RUN apt-get -y update && apt-get upgrade -y \
    git \
    zlib1g-dev \
    libzip-dev \
    unzip \
    zip

RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

ENV NVM_VERSION v8.19.2
ENV NODE_VERSION v18.10.0
ENV NVM_DIR /usr/local/nvm
RUN mkdir $NVM_DIR
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh && \
    nvm install $NODE_VERSION && \
    nvm alias default $NODE_VERSION && \
    nvm use default" | bash

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

CMD ["php-fpm"]
