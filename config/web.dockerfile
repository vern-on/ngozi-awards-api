FROM nginx:latest

COPY ./web-server.conf /etc/nginx/conf.d/default.conf