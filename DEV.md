# Generate self signed certs

openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout server.key -out server.crt

# Allow self signed cert

'allow_self_signed' => true,

# Rebuild images

docker-compose up -d --no-deps --build

# Start containers

docker-compose up -d

# Stop containers

docker-compose down
