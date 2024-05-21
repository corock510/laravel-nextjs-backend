# ベースイメージ
FROM php:8.2-apache-buster

# メンテナ情報
LABEL maintainer="ucan-lab <yes@u-can.pro>"

# シェル設定
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# 環境変数
ENV TZ=UTC \
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

# Node.js のインストール
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# 必要なパッケージのインストール
RUN apt-get update && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev unzip locales && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8

# Apache設定
RUN a2enmod rewrite

# PHP拡張機能のインストール
RUN docker-php-ext-install intl pdo_mysql zip bcmath

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ローカルデバッグ用にXdebugをインストール
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# PHPとApacheの設定ファイル
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/apache/httpd.conf /etc/apache2/sites-available/000-default.conf

# ワークディレクトリの設定
WORKDIR /work/backend
