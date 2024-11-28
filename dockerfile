FROM tomsik68/xampp:8

# Git installieren
RUN apt-get update && apt-get install -y git

WORKDIR /opt/lampp/htdocs/GeometricCalculator

RUN git clone https://@github.com/NoahYannis/GeometricCalculator.git .

EXPOSE 80
EXPOSE 443