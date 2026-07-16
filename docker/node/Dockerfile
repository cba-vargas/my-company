FROM node:26-alpine

RUN apk add --no-cache su-exec

COPY docker/node/entrypoint.sh /usr/local/bin/starter-node-entrypoint
RUN chmod +x /usr/local/bin/starter-node-entrypoint

WORKDIR /var/www/html

ENTRYPOINT ["starter-node-entrypoint"]
CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]
