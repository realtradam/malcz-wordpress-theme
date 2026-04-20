FROM alpine:3.20
COPY . /src
CMD ["sh", "-c", "cp -a /src/. /theme/ && echo \"Theme synced at $(date)\" && tail -f /dev/null"]
