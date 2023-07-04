Que es devops
DEVELOPEMENT OPERATION
Union de personas, procesos y tecnologia con el fin valor continuamente a los clientes
Entregar mejores productos en menor tiempo y con mucha mas calidad

####### Aspetos fundamentales de DevOps ##########

Control de versiones: git, svn -> Github, gitlab , bitbucket, mercurial

Integración continua: Pipelines jenkins, Automatizar compilaciones y pruebas cuando se hace el commit

Entrega continua: Suministro de software rapido y confiable en cualquier momento

Infraestructura como código: Terraform -> Definición declarativa de la infraestructura mediante archivos de definición basados
en texto para evitar revertir, desmontar y recrear entornos complejos

Supervición y registro: Prometheus, grafana -> Monitorización, recompilación de métricas y vinculación de datos de performance. 

Apendisaje validado: Analisis de datos para mejorar los procesos en cada ciclo nuevo


####### Site reliability Enginer (devops)######

############# OPERACIONES #############

Docker => crear contenedores, crear imagenes y hacer orquestaciones (empaquetar aplicaciones)
Kubernetes => (orquestar contenedores) e infraestructura como código (ejecutar contenedores)
Prometheus / Grafana => Observabilidad (monitorización)


############# DESARROLLO #############

Git-flow
Github-GitLab
Microservicios (agilidad en contenedores)
Pruebas unitarias

#####################################################################################
#####################################################################################

###### CONTENEDORES ######

Contenedores: Unidad de sofware que empaqueta el código y todas las dependencias necesarias para la aplicación
Imagenes: Paquete ligero y ejecutable de sofware con todo lo necesario para la aplicación
Docker-Engine: Motor de ejecución de contenedores
Docker-Hub: Repositorio por defecto de las imagenes de los contenedores de docker
Podman: Alternativa openSource a docker
Docker-compose: Orquestador ligero de contenedores
docker-Swarm: Orquestador de contenedores que permite manejar un cluster
Kubernetes: Sistema para la administración de clusters y Orquestadores Empresarial de contenedores


######## Instalación Ubuntu en virtual box ##########

########### CONTENIDO DEL OTRO CURSO ##################
########### CONTENIDO DEL OTRO CURSO ##################

este curso ya arranca usando un pc con ubuntu como sistema operativo, entonces crearemos una maquina virtual para trabajar de manera remota

(utilizamos el curso "La Guía de Jenkins: ¡De Cero a Experto! | Junio 2023" cap 3 video numerado 8 "Preparación de la máquina virtual")


IMAGEN https://www.osboxes.org/ubuntu/

Virtual box -> Maquina -> nueva maquina , nombre 'Ubuntu jen curso 02', tipo 'linux', versión '64'
Siguiente memoria 4gb => existing virtual hard disk y añadir donde descomprimimos el archivo
cuando se cargue realizaremos una snapshot de la original

cuando se prenda poner el siguiente comando

"sudo apt-get update" y poner la contraseña osboxes.org
sudo apt-get install vim

apagar la maquina virtual y en 
configuración => red => poner de nat  a "ADAPTADOR PUENTE" y en avanzado em modo promiscuo poner aceptar todo
prenderla y ejecutar el siguiente comando
sudo apt-get install openssh-server "para poder acceder desde putty" esto te va a pedir que pongas "Y"

este comando es para verificar que funciona bien
sudo systemctl status ssh
buscar => active (running)

ip a (para ver la ip interna)
sudo apt-get install net-tools (instalar herramientas de red)
ejecutar nuevamente "ip a"


entrar por putty


########### FIN UTILIZACIÓN CONTENIDO DEL OTRO CURSO ##################
########### FIN UTILIZACIÓN CONTENIDO DEL OTRO CURSO ##################


ATAJO = Abrir terminal "Ctrl + Alt + T"

### coonfigurar teclado ###

ir a configuración de ubuntu y poner en teclado la distribución spanish windows

para instalar docker seguir los siguientes pasos de la pagina

https://docs.docker.com/engine/install/ubuntu/

sudo apt-get update
sudo apt-get install ca-certificates curl gnupg

sudo install -m 0755 -d /etc/apt/keyrings
 curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
 sudo chmod a+r /etc/apt/keyrings/docker.gpg

echo \
  "deb [arch="$(dpkg --print-architecture)" signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
  "$(. /etc/os-release && echo "$VERSION_CODENAME")" stable" | \
  sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

sudo apt-get update

sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

-- para ver que funcione bien ejecutar (primero sale que no se encuentra, pero
hay que esperar que se baje del repo)

sudo docker run hello-world

sudo docker -v // (Docker version 24.0.2, build cb74dfc)

sudo docker compose version // (Docker Compose version v2.18.1)

ACLARACIÓN dice que ya en las nuevas versiones no se llama docker-compo sino que docker compose

POST INSTALACIÓN 
sudo groupadd docker (cuando se instala algunas veces se crea solo)
sudo usermod -aG docker $USER

#### ROTACIÓN LOGS #####
https://docs.docker.com/config/containers/logging/json-file/

sudo nano /etc/docker/daemon.json 

{
  "log-driver": "json-file",
  "log-opts": {
    "max-size": "10m",
    "max-file": "3" 
  }
}

apretamos control + x, (luego enter)

cat /etc/docker/daemon.json (visualizar)

reiniciar

docker ps -a (visualizar contenedores) <= vemos que ya podemos utilizar los comandos
de docker sin sudo


https://techcommunity.microsoft.com/t5/windows-11/how-to-install-the-linux-windows-subsystem-in-windows-11/m-p/2701207

"install the Linux Windows Subsystem in Windows 11"
wsl --install (instalar)
wsl -l -o (listar)
wsl -- install -d ubuntu (instalar el que te parezca)


// cuando unicia la pc arrancara el instalador de ubuntu virtualizado
Ubuntu ya está instalado.
Iniciando Ubuntu...
Installing, this may take a few minutes...
Please create a default UNIX user account. The username does not need to match your Windows username.
For more information visit: https://aka.ms/wslusers
Enter new UNIX username:

///////////////

ingresar usuario y contraseña


########## DOCKER HUB DESKTOP ######## OPCIONAL NO SE USARA EN EL CURSO NI EN ENTORNO EMPRESARIAL

https://docs.docker.com/desktop/install/windows-install/
dice que el kernel se instala primero
https://learn.microsoft.com/es-es/windows/wsl/install-manual#step-4---download-the-linux-kernel-update-package
(Paquete de actualización del kernel de Linux en WSL 2 para máquinas x64)

cuando inicie la pc va a pedir aceptar los terminos y condiciones de docker hub

configuración => kubernetes => activar las 2 casillas (instalar el componente que te píde) volver a realizarlo y poner aplicar
y reiniciar

una vez instalado ejecutar en powershell

 docker --version
 docker-compose version

 avisa que no es necesario instalar un SO de linux para utilizar estas tecnologias

 docker runh -d -p 80:80 docker/gettin-started


 ############## FIN OPCIONAL

testear en putty funcionalidad de docker en linux
docker run hello-world

ir al docker hub "https://hub.docker.com/r/sotobotero/udemy-devops/"

y pegar el siguiente comando

docker pull sotobotero/udemy-devops:0.0.1

inicializar contenedor a partir de una imagen

docker run -p 80:80 -p  8080:8080 --name billingapp sotobotero/udemy-devops:0.0.1

-- "80:80 -p  8080:8080" puertos necesarios, 80 es angular y 8080 para el microservicio
-- "billingapp" nombre contenedor


ingresaremos al compilado localhost:80 
al igual que el panel localhost:8080/swagger-ui/index.html => admin admin
pero de la maquina virtual con linux ya que el codigo se encuentra enlazado con el ip nat

Opcional para segunda instancia
"docker rm -f efdd8570a51a3b7a18deed68f7cc65b3ab1832b10b3742081ab4f9fac8f94f57" eliminar contenedor por id
"docker rm -f 162332b550313e7be0914a65dc144def821c6e7bbf1b6a06bc60779253d13511 eliminar contenedor por id

CTRL + c despues de un rato corta el servicio


docker image ls (listar imagenes)
docker ps -a (listar los contenedores)
docker start billingapp (inicializar contenedor)
docker logs billingapp (ver logs del contenedor)
docker stop billingapp (detener el contenedor)
docker image rm -f sotobotero/udemy-devops:0.0.1 (eliminar imagen)


############## POSTGRES IMAGEN DE DOCKER HUB ##########

archivo docker-compose.yml

###
version: '3.1'
services:
  db:
    container_name: postgres
    image: postgres
    restart: always    
    ports:
      - 5432:5432
    environment:
      POSTGRES_USER: postgres
      POSTGRES_PASSWORD: qwerty
      POSTGRES_DB: postgres    

  adminer:
    container_name: adminer
    image: adminer
    restart: always
    depends_on: 
      - db
    ports:
       - 9090:8080
###
para ejecutar este archivo (nombre definido autodetectable "docker-compose.yml" )
docker-compose pull
para ejecutar un archivo con nombre diferente seria
docker-compose -f stackdb.yml pull

## ATAJOS ##
vim index.html (crear archivo en vim)
Presiona la letra i en tu teclado para ingresar el modo INSERT (insertar)
Cuando termines de editar el archivo, presiona la tecla ESC. Esto te saca del modo INSERT y -- INSERT -- desaparece de la parte inferior izquierda de tu terminal.
Para guardar el archivo, escribe dos puntos (:) seguido de wq. Por ejemplo :wq!


######### OPCIONAL INSTALAR WEBADMIN para gestionar el servidor desde el nevegador en windows de manera remota #########

sudo apt update
sudo apt install wget apt-transport-https
wget http://www.webmin.com/download/deb/webmin-current.deb
sudo dpkg -i webmin-current.deb
sudo apt --fix-broken install
https://TU_IP_UBUNTU:10000/

#########################

Nueva carpeta
mkdir $nombre_carpeta
crear archivo
vim index.html
visualizar contenido
cat index.html

para buscarlo en el filemanager de webadmin tenemos que situarnos en:
home/osboxes/nueva_carpeta

###########################

continuando despues del pull
podemos realizar un
docker image ls (para verificar las imagenes descargadas)

docker compose -f stackdb.yml up -d (en caso de que el archivo tenga otro nombre)
docker compose up -d

al ingresar en el sistema linux por localhost:9090 podremos ingresar al adminer

se logro ingresar al sitio remotamente solo colocando http://192.168.1.45:9090/

tipo de BD postgres
usuario postgres
clave qwerty
BD postgres
(todo esto definido en el archivo yml)

pegar los archivos en el sistema linux

-- (eliminado) archivos/billingApp (sin el dockerfile y el stackdb.yml)

ls -la (visualizar contenido de carpeta con detalle de accesos)

docker build -t billingapp:prod --no-cache --build-arg JAR_FILE=target/*.jar .

cuando finalice ingresar directamente sin puerto "192.168.1.45"


####### LOGIN DOCKER HUB ############
hay que ingresar a docker hub y te indica que comando utilizar para conectarte
cuando en seguridad se crea un tocken para ingresar
PD: aunque mi usuario sea BraianZamudio me pide que ingrese con todo en minuscula

docker login -u braianzamudio -p __TOKEN__ (funcional)

docker push __NOMBRE_CONTENEDOR_:_ETIQUETA_
docker push __NOMBRE_CONTENEDOR_:_ETIQUETA_

docker push sotobotero/udemy-devops:0.0.1 (no funciono dice denegado)

-- vamos a clonar la imagen para intentar enviarla con el pull que recomienda 
docker image tag sotobotero/udemy-devops:0.0.1 braianzamudio/devops01:latest
-- docker image tag billingapp:prod devops01:0.0.1

docker hub "docker push braianzamudio/devops01:l" (al parecer se creo con la etiqueta l)



######### DOCKER #######

DOCKER: sirve para levantar imagenes, crear contenedores y ejecutar aplicaciones (usa los dockerfile)
DOCKER COMPOSE (orquestador de contenedores): es un sistema auxiliar a lo que seria el docker base, orquestador que permite definir servicios que requieren multiples contenedores, multiples imagenes que requieren estar dentro de una misma red y permiten utilizarlos de una manera mas sencilla (usa los docker-compose.yml)

###### VOLUMENES PERSISTENTES ######

la creación de contenedores puede utilizar el disco por fuera de los contenedores, esto se realiza para poder eliminar el contenedor y no perder la información. Por ejemplo si estamos trabajando con una imagen que tiene una base de datos esta misma la podemos recrear la cantidad de veces que querramos y no se perdera la información que estemos guardando.
Esto lo aclaramos por que al recrear un contenedor necesitamos que el volumen se recree nuevamente ya que el creado no es funcional necesitamos verificar el directorio del volumen y eliminarlo manualmente ya que el generador de contenedores verifica que si existe no sera eliminado.

######### PROYECTO 02 docker java angular postgres #########
######### PROYECTO 02 docker java angular postgres #########

docker ps -a (listar contenedores)
docker kill $(docker ps -q) (detener todos los contenedores)
docker system prune (eliminar todos los contenedores)
docker image ls (listar las imagenes)
docker image prune (eliminar todas las imagenes)
docker volume ls (visualizar los volumenes generados)
docker image prune -a (eliminar todos los volumene)
docker compose stop (se detuvieron los contenedores para poder eliminarlos con el prune)

pegar los archivos de la carpeta "archivos/billingApp_v2" en el servidor y tirar un cd al directorio
recrear el yml
docker compose -f stack-billing.yml build
docker compose -f stack-billing.yml up -d (para prender el contenedor en background)

docker ps -a (para verificar que esten activas)

ya el servicio es accesible desde localhost:80 dentro de la maquina virtual

localhost:9090 como tambien del 192.168.1.45:9090 para entrar al adminer en la BD billingapp_db

SERVIDOR postgres_db
USUARIO postgres
CLAVE qwerty
BD postgres

docker compose -f stack-billing.yml stop

######## MONITORES FISICOS ########

docker stats (muestra un administrador de tareas)
CTRL + C para detener el comando "docker stats"

########
#Billin app frontend service
  billingapp-front:
    build:
      context: ./angular 
    deploy:   
        resources:
           limits: 
              cpus: "0.15"
              memory: 250M
#recusos dedicados, mantiene los recursos disponibles del host para el contenedor
           reservations:
              cpus: "0.1"
              memory: 128M
    #container_name: billingApp-front
    depends_on:     
      - billingapp-back
#rango de puertos para escalar    
    ports:
      - 80:80 
#########

en el caso actual vamos a restringir el consumo de un servicio agregando el fragmento en deploy, esto limitara solo el contenedor seleccionado

######## PROYECTO 3 ENTORNOS MULTIPLES CON REDES VIRTUALES SIMULTANEAS ##########
######## PROYECTO 3 ENTORNOS MULTIPLES CON REDES VIRTUALES SIMULTANEAS ##########

docker stop $(docker ps -a -q)       (detener todos los contenedores)
docker system prune --all        (eliminar todos los contenedores, volumenes, redes) (al parecer que esten apagados)

pasar los archivos de la carpeta archivos/billingApp_v3 al servidor linux
dar un cd al directorio

docker compose -f stack-billing.yml up -d --force-recreate (force recreate es por si tenia una imagen o contenedor existente lo vuelve a recrear)

#######
networks:
  env_prod:
    driver: bridge  
    #activate ipv6
    driver_opts: 
            com.docker.network.enable_ipv6: "true"
    #IP Adress Manager
    ipam: 
        driver: default
        config:
        - 
          subnet: 172.16.232.0/24
          gateway: 172.16.232.1
        - 
          subnet: "2001:3974:3979::/64"
          gateway: "2001:3974:3979::1"


  env_prep:   
    driver: bridge  
    #activate ipv6
    driver_opts: 
            com.docker.network.enable_ipv6: "true"
    #IP Adress Manager
    ipam:
        driver: default
        config:
        - 
          subnet: 172.16.235.0/24
          gateway: 172.16.235.1
        - 
          subnet: "2001:3984:3989::/64"
          gateway: "2001:3984:3989::1"
#######
este es un fragmento den yml que habla de lo nuevo que se esta agregando "networks"
son redes indistintas que permiten crear en este caso 2 ambientes simultaneos que trabajen de manera independiente 

en cada servisio hay que seleccionar el deseado de esta manera

####
networks:
     - env_prod
####

recordar que el archivo completo se encuenta en: archivos/billingApp_v3/stack-billing.yml

docker ps -a (visualizar si todos los contenedores se crearon)

docker logs $NOMBRECONTENEDOR (visualizar si salen errores)

ahora vemos que al ingresar en localhost:80 y localhost:81 se abren los diferentes ambientes indistintos
y en el localhost:9090 podemos acceder al adminer de ambas redes, con el solo echo de cambiar el "SERVER"




############ DOCKER SWARM #############

docker info

si vemos dice que docker swarm esta inactivo

docker swarm init (activar el swarm)
verificar el "Node Address" para saber que ip utilizar ya que a partir de este metodo el localhost no funciona


docker stack deploy -c stack-billing.yml billing

en docker swarm los contenedores se conocen como stack y se tiene que poner un prefijo para que nombre a las dependencias "billing"
docker service ls (muestra los servicios del stack)
docker stack ps $NOMBRESTACK           /PREFIJO("billing")    (ver detalles de un stack) lo muestra a modo contenedor
docker stats (igual que docker compose)

docker stack rm billing (remover los servicios)
docker swarm leave --force (desactiva swarm)

########### ESCALABILIDAD Y CLUSTERIZADO ###########

Escalabilidad vertical = tener un nodo (servidor) y sumarle recursos al servidor (compara ram y micros)
Escalabilidad horizontal = tener varios nodos conectador por red y que trabajen como uno
Cluster = grupo de nodos (para aplicar el método horiontal en este caso)



######### KUBERNETES ###################################
######### KUBERNETES ###################################

Principales objetos de Kubernetes

Pods: Unidad mas pequeña que se puede desplegar y gestionar en kubernetes. Es un grupo de uno o mas contenedores que comparten almacenamiento y red y especificaciones de como ejecutarse. Son efimeros.
-- EFIMERO : en aplicaciónes significa que si una aplicación falla esta se puede recrear nuevamente. Para evitar perdida de información de los usuarios

Deployments: Describe es estado deseado de una implementación, ejecuta múltiples replicas de la aplicación, remplaza las que estan defectuosas o no responden.

Services: Definición de como se va a exponer una aplicación que se ejecuta en un conjunto de pods como un servicio de red (por defecto se usa roud-robin para el balanceo de carga).

Config Map: Permite desacoplar la configuración para hacer las imagenes mas portables, almacenan las variables de entorno, argumentos para línea de comandos, o configuración de volúmenes que pueden consumir los pods (no encriptación).

Labels: Pares de clave valor ("enviroment" : "qa") para organizar, seleccionar, consultar y monitorear objetos de forma mas eficiente, ideales para UI y CLIs.

Selectores: Mecanismos para hacer consultas a las etiquetas. 
  -> kubectl get pods -l 'enviroment (production), tier in (frontend)'


sudo apt-get install grep (opcional instalar grep)

###### instalar kubectl #########
https://k8s-docs.netlify.app/en/docs/tasks/tools/install-kubectl/

curl -LO https://storage.googleapis.com/kubernetes-release/release/`curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt`/bin/linux/amd64/kubectl

chmod +x ./kubectl (dar permisos)
sudo mv ./kubectl /usr/local/bin/kubectl (moverlo a los binarios)
kubectl version --client (verificar version instalada del kubectl)

######### SALIDA el warning no importa es solo por como se lo consulto
WARNING: This version information is deprecated and will be replaced with the output from kubectl version --short.  Use --output=yaml|json to get the full version.
Client Version: version.Info{Major:"1", Minor:"27", GitVersion:"v1.27.3", GitCommit:"25b4e43193bcda6c7328a6d147b1fb73a33f1598", GitTreeState:"clean", BuildDate:"2023-06-14T09:53:42Z", GoVersion:"go1.20.5", Compiler:"gc", Platform:"linux/amd64"}
Kustomize Version: v5.0.1

######### INSTALAR Minikube  ###############

https://k8s-docs.netlify.app/en/docs/tasks/tools/install-minikube/

curl -Lo minikube https://storage.googleapis.com/minikube/releases/latest/minikube-linux-amd64 \
  && chmod +x minikube

sudo mkdir -p /usr/local/bin/
sudo install minikube /usr/local/bin/

minikube start

docker ps -a (para visualizar que el contenedor de minikube esta corriendo)

minikube status

minikube stop (para detener)
minikube dashboard --url (lanzar el dashboard)


############## FALLOS ############

el dashboard no funcionaba con la ip nat y con la ip local de la red accediendo desde windows
se realizo utilizar como virtualizador el metodo de driver por docker virtual box y nada funciono
se verifico en internet y es una problematica que muchos tienen

"http://127.0.0.1:44535/api/v1/namespaces/kubernetes-dashboard/services/http:kubernetes-dashboard:/proxy/"

http://127.0.0.1:46035/api/v1/namespaces/kubernetes-dashboard/services/http:kubernetes-dashboard:/proxy/


! Exiting due to GUEST_DRIVER_MISMATCH: The existing "minikube" cluster was created using the "docker" driver, which is incompatible with requested "virtualbox" driver.
* Suggestion: Delete the existing 'minikube' cluster using: 'minikube delete', or start the existing 'minikube' cluster using: 'minikube start --driver=docker'


Exiting due to PROVIDER_VIRTUALBOX_NOT_FOUND: The 'virtualbox' provider was not found: unable to find VBoxManage in $PATH
* Suggestion: Install VirtualBox
* Documentation: https://minikube.sigs.k8s.io/docs/reference/drivers/virtualbox/

lsb_release -a (saber la versión de ubuntu)


minikube start --driver=docker

https://github.com/kubernetes/minikube/issues/3900
  - https://github.com/kubernetes/minikube/issues/4730

https://www.shellhacks.com/install-minikube-on-ubuntu-virtualbox/

######## UBUNTU EN VMWARE ###########

https://www.osboxes.org/ubuntu/#ubuntu-22-10-vmware
https://www.youtube.com/watch?v=I6WfFLQwoPg&t=53s

hay que instalar el ubuntu sin imagen iso y luego utilizar la descargada como disco existente

https://www.youtube.com/watch?v=zVPk-HwNVkA
poner la placa de red en modo bridge para mantener la ip de la red y acceder desde putty

#####################################################


## Crear un por a partir de una imagen de docker ##

esto sale del repo de : https://hub.docker.com/r/sotobotero/udemy-devops/tags
kubectl run kbillingapp --image=sotobotero/udemy-devops:0.0.1 --port=80 80 (crear pods)
// SALIDA "pod/kbillingapp created"

kubectl get pods

kubectl describe pod kbillingapp

kubectl expose pod kbillingapp --type=LoadBalancer --port=8080 --target-port=80

// SALIDA // "service/kbillingapp exposed"

kubectl get services (visualiza los servicios activos)
kubectl describe service kbillingapp
minikube service --url kbillingapp
// SALUDA // "http://192.168.49.2:31448/" se abre dentro del ubuntu


############ PROYECTO CON MULTISERVICIOS ##########

echo -n "postgres" | base64     (salida => cG9zdGdyZXM=) [lo conveirte en base 64]
echo -n "qwerty" | base64 (cXdlcnR5)
echo "cG9zdGdyZXM=" | base64 -d [decodifica base64]


####### POD postgres #########
secret-dev.yaml

#####
#object that store enviroments variables that could ba have sensitive data like a password
apiVersion: V1
kind: Secret
metadata:
  name: postgres-secret
  labels:
    app: postgres
    #meant that we can use arbitrary key pair values
type: Opaque
data:
  POSTRGRES_DB: cG9zdGdyZXM=
  POSTRGRES_USER: cG9zdGdyZXM=
  POSTRGRES_PASSWORD: cXdlcnR5
#####

####### POD pgadmin #########
secret-pgadmin.yaml

#####
#object that store enviroments variables that could be have sensitive data like a password
apiVersion: v1
kind: Secret
metadata:
  name: pgadmin-secret
  labels:
    app: postgres
    #meant that we can use arbitrary key pair values
type: Opaque
data:
  PGADMIN_DEFAULT_EMAIL: YWRtaW5AYWRtaW4uY29t
  PGADMIN_DEFAULT_PASSWORD: cXdlcnR5
  PGADMIN_PORT: ODA=
#####

Pasamos a dejar los archivos yaml en la carpeta para tenerlos listos para subir (en esta docu)

archivos\devops

pasamos a subir los archivos yaml a el servisor usando el webadmin en una carpeta especifica par trabajar
kubernetes/devops

mkdir kubernetes
cd kubernetes
mkdir devops

buscarlo en webadmin como "home/osboxes/kubernetes/devops"

si tiramos un "ls" veremos los archivos en la consola

para lanzarlos uno a uno

kubectl apply -f secret-dev.yaml (salida => secret/postgres-secret created)
kubectl apply -f secret-pgadmin.yaml
kubectl apply -f configmap-postgres-initbd.yaml
kubectl apply -f persistence-volume.yaml
kubectl apply -f persistence-volume-claim.yaml
kubectl apply -f deployment-postgres.yaml
kubectl apply -f deployment-pgadmin.yaml
kubectl apply -f service-postgres.yaml
kubectl apply -f service-pgadmin.yaml

para visualizar todos los módulos que activamos podemos utilizar

kubectl get all
o solamente visualizar los pods
kubectl get pods

minikube ip (para sacar la ip del cluster de minikube) 192.168.49.2
por ejemplo para el pgadmin sumarle el puerto "30200"
192.168.49.2:30200
credenciales del pgadmin
admin@admin.com | qwerty
(estas credenciales se colocaron en el secret de pgadmin  "secret-pgadmin.yaml")

volvemos a la consola y sacamos el puerto del sevicio de postgres "30432"
192.168.49.2:30432

y agregamos un servidor
GENERAL
  NAME => postgresservice
CONNECTION
  HOST => 192.168.49.2
  PORT => 30432
  DATABASE => postgres
  USERNAME => postgres
  PASSWORD => qwerty
### SALVAR ###  
(las credenciales se definieron en "secret-dev.yaml")


aqui encontraremos la base de datos que se creo con el archivo "configmap-postgres-initbd.yaml"

### OPCIONAL podemos ingresar a la base de datos con la ip interna del cluster

kubectl delete -f ./ (eliminar de kubernete todas las definiciones creadas anteriormente)

docker ps -a (visualizar todos los contenedores de docker)
docker exec -it minikube /bin/bash (bin/bash es para conectarnos a la consola)
ls -la/mnt/data/ (para visualizar que los volumenes persistentes aun se encuentran en el contenedor)
exit (salir del cluster)

##### METODO MASIVO ######

kubectl apply -f ./ (recrea todo lo que se encuentre en la carpeta ".yaml")


################################################

####### ORQUESTACIÓN DE SERVICIO DE FACTURACIÓN ########

minikube docker-env (generar todas las variables necesarias para que el engine apunte a los registros del minikube)
eval $(minikube -p minikube docker-env)             (aplicar configuración)

subir los archivos de la carpeta "archivos/devops2/billingApp_images_v4"
vamos a dejar todos estos archivos en "home/osboxes/kubernetes/devops2/billingApp_images_v4"
subir los archivos en .zip

cd $HOME
cd kubernetes
mkdir devops2
cd devops2/billingApp_images_v4
ls
cd java

docker build -t billingapp-back:0.0.4 --no-cache --build-arg JAR_FILE=./*.jar . 
(genera la imagen de java de los archivos que subimos)

cd ..
cd angular
docker build -t billingapp-front:0.0.4 --no-cache .  (genera la imagen de ngix para angular)
docker image ls (visualizar las imagenes creadas)

########### SALIDA "docker image ls"
REPOSITORY                    TAG       IMAGE ID       CREATED          SIZE
billingapp-front              0.0.4     f9e78981327e   10 seconds ago   48MB
billingapp-back               0.0.4     2f05cada1aef   5 minutes ago    458MB
hello-world                   latest    9c7a54a9a43c   7 weeks ago      13.3kB
gcr.io/k8s-minikube/kicbase   v0.0.39   67a4b1138d2d   2 months ago     1.05GB
###########

subir los archivos de la carpeta "archivos/devops2/billingApp"
vamos a dejar todos estos archivos en "home/osboxes/kubernetes/devops2/billingApp"

a diferencia del proyecto anterior esta tiene unas ips estaticas para que podamos acceder siempre entre los servicios 

cd ..
cd ..
cd billingApp
ls
kubectl apply -f ./
kubectl get all (visualizar todos los módulos cargados "archivos .yaml")
minikube ip ("192.168.49.2")
puerto del servicio front "30100" (se visualiza en el comando "kubectl get all")
////// de aca sacamos el puerto
"service/billing-app-front-service   NodePort       10.98.134.65    <none>        80:30100/TCP     30s"
////// FIN de aca sacamos el puerto

192.168.49.2:30100

######## REVISAR DESPUES DE HACER BACKUP SI CON ESTE METODO PUEDO ABRIR LOS PUERTROS PARA ACCEDER DESDE WIN ##
https://www.serverpronto.com/accounts/knowledgebase/11/OpenorClose-Ports-on-Ubuntu-distributions.html?gclid=CjwKCAjwkeqkBhAnEiwA5U-uM4tMSLxfynDMmXNaPlkmO8qkxz0MbdAcCoS6V3MiF92Eycyd1Z-mmBoCqzgQAvD_BwE
##################################

#########################################

GIT: es un sistema de control de versiones
y esto se conecta con un repositorio de código centralizado (bitbuket, github, gitlab)

metodologias = TRUNK-BASED y GITFLOW

git --version (si aparece instalada no hacer nada)
## si no se encuentra instalada ##
apt-get update
apt-get install git
###############

git config --global user.name "Udemy prueba"
git config --global user.email "braian@braianzamudio.com"
git config --list

############### generar tocken en github ###############
perfil => settings => developer settings => personal access tockens => classic
generate new tocken clasic => validar con el celular
NOTE => tocken devops2 => todos los permisos chequeables
############################################################

ejemplo clonar repo
git clone https://github.com/usuario/repo.git

################

crear repo para comando de git
mkdir practice-trunk-based
cd practice-trunk-based
git init / git -c init.defaultBranch=master init (2 metodos diferentes)
agregar el archivo README.txt en la carpeta
git add . (agrega todos los archivos al control de versiones)
git commit -m "se inicializa el repositorio con el archivo readme"
git branch (mostrar rama)

########## dentro del sitio de github #########

crear una rama privada el cual te dara el siguiente mensaje

######
echo "# repo-devops2" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/usuario/repositorio
git push -u origin main
######

(y pegar esta linea para sincronizar el repo con la carpeta)
git remote add origin https://github.com/usuario/repositorio
git push -u origin master

colocar usuario y contraseña de github (el nombre del tocken y el tocken)

git branch feature/cs-2356847 master (crear una nueva rama)
git branch (nos salen ambas ramas [el asterisco señala donde estamos])
git checkout feature/cs-2356847
agregar a la el directorio la carpeta del microservicio "testgit/billing"
git add .
git commit -m "se agrega el código fuente del servicio de facturación"
git push -u origin feature/cs-2356847
git pull origin master (actualizar la rama con la master)
git add .
git commit -m "se actualiza con lo ultimo que hay en la rama master"
git pull -u origin feature/cs-2356847 ( me da un error en el comando "u")

#############################################################################
#############################################################################
CI/CD => integración continua/entrega o implementación continuas
Inregración continua: automatizar la gestion de los cambios que envian los multiples contribuidores en un unico proyecto de sofware
Entrega continua: pasar a productivo los cambios


Pipeline: Grupo logico de actividades que de manera conjunta realizan una tarea
Jenkins: Servidor de automatización open source
Slark: Plataforma propietaria de comunicación empresarial (Caracteristica mas relevante channel)
SonarQube: Plataforma opensource para la implementación continua de la calidad del código, puede ejecutar revisiones en automático.
Selenium: Framework para probar aplicaciónes web, permite escribir test funcionales de manera sensilla.


############ JENKINS ####################

buscar la imagen de dockerhub
https://hub.docker.com/r/jenkins/jenkins

(no ejecutar)docker pull jenkins/jenkins (guardar este link para crear un dockerfile, y de esta manera extender a MAVEN)

mover el archivo Dockerfile al servidor dentro de una carpeta "devops/jenkins", este docker file contenda el comando de la imagen de jenkis y ademas complementara instalando maven
ls -la (visualizar contenido de la carpeta)
docker build -t jenkins-cicd --no-cache . (el punto es el contexto de donde va a encontrar el dockerfile)


######### NO FUNCIONO MAVEN ############# (FUNCIONO EL FIX)
como no funcionao buscamos la imagen de maven en este sitio
https://maven.apache.org/download.cgi

para cambiar este fragmento
"RUN  wget --no-verbose https://dlcdn.apache.org/maven/maven-3/3.9.3/binaries/apache-maven-3.9.3-bin.tar.gz -P /tmp/"
y las demas referencias de la version "3.9.3"

######
FROM jenkins/jenkins
USER root

#Update Base OS and install additional tools
RUN apt-get update && apt-get install -y wget
RUN  wget --no-verbose https://dlcdn.apache.org/maven/maven-3/3.9.3/binaries/apache-maven-3.9.3-bin.tar.gz -P /tmp/
RUN tar xzf /tmp/apache-maven-3.9.3-bin.tar.gz -C /opt/ 
RUN ln -s  /opt/apache-maven-3.9.3 /opt/maven 
RUN ln -s /opt/maven/bin/mvn /usr/local/bin 
RUN rm /tmp/apache-maven-3.9.3-bin.tar.gz 

#Set up permissions
RUN chown jenkins:jenkins /opt/maven;
ENV MAVEN_HOME=/opt/mvn
USER jenkins
######
######### FIN NO FUNCIONO MAVEN #############

docker image ls

docker run -d -p 8080:8080 -p 50000:50000 --name jenkins jenkins-cicd
-d (lo ejecuta en segundo plano)
-p (puertos)
--name jenkins (nombre del contenedor)
jenkins-cicd (nombre de la imagen)

docker ps -a (visualizar contenedores activos)

ingresar al dashboard mediante localhost:8080 dentro de la virtual

docker logs jenkins

y nos dara un log para sacar la contraseña para ingresar al dashboard de jenkins

"35d12a719ae44fc4a3d75b0ffbf2e967"

(para ejecutar el contenedir si apagaste la pc)
docker start f5356f913894 (es el id del contenedor)

########### PROYECTO 01 Jenkins ###########

configurar en github que los repositorios nuevos se creen con la rama principal llamada "master" ya que default viene "main"

crear un nuevo repositorio privado llamando devops repo-devops3

crear una carpeta llamada "repo-devops3" dentro del servidor en el cual vamos a cargar los archivos que se encuentran en 
archivos/jenkins_p1

una ves que estemos en el directorio "repo-devops3"

git init

////// SALIDA //////////
hint: Using 'master' as the name for the initial branch. This default branch name
hint: is subject to change. To configure the initial branch name to use in all
hint: of your new repositories, which will suppress this warning, call:
hint: 
hint:   git config --global init.defaultBranch <name>
hint: 
hint: Names commonly chosen instead of 'master' are 'main', 'trunk' and
hint: 'development'. The just-created branch can be renamed via this command:
hint: 
hint:   git branch -m <name>
Initialized empty Git repository in /home/osboxes/devops/jenkins/repo-devops3/.git/
/////////////////////

git add . (para agregar todo el contenido al repo)
git commit -m "Start new repository" (guardar los cambios)
git branch (para verificar la rama)
git remote add origin https://github.com/Braian-92/repo-devops3.git
git push -u origin master (nos pedira el usuario y la clave generada del tocken de git)

(si cargamos el repor en github desktop en windows tirando un fetch veremos los cambios cargados directamente en la master)

######## JOBS en jenkins #########
ahora crear una nueva tareal libre en jenkins desde el dashboard "devops_test1"
en source code management elegimos git

buscamos el link https de github para clonarlo
"https://github.com/Braian-92/repo-devops3.git" y lo pegamos en la url que pide el jenkins
luego en credenciales seleccionamos el grupo de jenkins
completar username con el usuario del tocken
poner el usuario como secreto en el checker inferior
y en password pegar la contraseña del tocken
y en ID ponemos "github-udemy" (para poder reutilizar las credenciales nuevamente)
en branch dejamos textual "master" (sin caracteres especiales "*")

luego en la seccion de build enviroment en la parte de build steps
seleccionamos invocar tareas de nivel superior de maven ("Invoke top-level Maven targets")
en goals colocar "clean install"
y en advanced POM => "billing/pom.xml" (colocamos el directorio del archivo POM)
ya esta listo para realizar un build

ahora entraremos al contenedor de jenkins
docker exec -it jenkins /bin/bash 
ahora buscamos en los logs de jenkins en la siguiente linea que indica el directorio del compilado
"/var/jenkins_home/.m2/repository/com/paymentchain/billing/0.0.1-SNAPSHOT/"
y lo ejecutamos dentro del contenedor con un 
ls -ls /var/jenkins_home/.m2/repository/com/paymentchain/billing/0.0.1-SNAPSHOT/
///////// SALIDA /////////////
total 46772
    4 -rw-r--r-- 1 jenkins jenkins      198 Jul  2 22:19 _remote.repositories
46756 -rw-r--r-- 1 jenkins jenkins 47877684 Jul  2 22:19 billing-0.0.1-SNAPSHOT.jar
    8 -rw-r--r-- 1 jenkins jenkins     5453 Jul  2 22:19 billing-0.0.1-SNAPSHOT.pom
    4 -rw-r--r-- 1 jenkins jenkins      709 Jul  2 22:19 maven-metadata-local.xml
////// FIN SALIDA ///////
exit (para salir del contenedor)

###### WEBHOOKS locales con NGROK (PROXY) ########

######### METODO NO FUNCIONAL SALTEAR ###################################################################
######### METODO NO FUNCIONAL SALTEAR ###################################################################
      registrarse en el sitio
      https://ngrok.com/
      tutorial para instalarlo
      https://www.youtube.com/watch?v=17pdBadnm4s

      descargar el archivo situarlo en el servidor, descomprimirlo y ejecutar el siguiente comando con las credenciales que nos dio la web de NGROK

      ngrok config add-authtoken XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
      (NO FUNCIONO)

      sudo cp ngrok /usr/local/bin   (nos recomiendan pasarlo a los binarios)[NO FUNCIONO]

      ngrok config add-authtoken XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
      ##### SALIDA ###
      bash: /usr/local/bin/ngrok: cannot execute binary file: Exec format error
      #########

      cd $HOME 
      cd /usr/local/bin/
      ls -la
      rm ngrok (eliminar)
      rm -i ngrok/* (no fuinciono)
      rm -f ngrok (no fuinciono)
      ///SALIDA// no funciono eliminarlo de los binarios
      rm: remove write-protected regular file 'ngrok'?
      //////

######### FIN METODO NO FUNCIONAL SALTEAR ###################################################################
######### FIN METODO NO FUNCIONAL SALTEAR ###################################################################

//////// Install ngrok via Apt
https://ngrok.com/download
(este nos salio con los comandos de linux por que ingresamos desde la maquina virtual del servidor)

curl -s https://ngrok-agent.s3.amazonaws.com/ngrok.asc | sudo tee /etc/apt/trusted.gpg.d/ngrok.asc >/dev/null && echo "deb https://ngrok-agent.s3.amazonaws.com buster main" | sudo tee /etc/apt/sources.list.d/ngrok.list && sudo apt update && sudo apt install ngrok

snap install ngrok
ngrok config add-authtoken XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
/// SALIDA //
ngrok config add-authtoken 2S2GjVajjsFHOtvLUwRFpuqpKbR_47bnRafqC7gCE3ZtKYNN7
/////////////////////
ngrok http 8080  (para enlazarlo con el puerto del jenkins)

////////// SALIDA //////////
Announcing ngrok's Kubernetes Ingress Controller: https://ngrok.com/s/k8s-ingress                                                  
Session Status                online                                              
Account                       MIUSUARIO (Plan: Free)                                   
Version                       3.3.1                                              
Region                        South America (sa)                                     
Latency                       31ms                                                 
Web Interface                 http://127.0.0.1:4040                               
Forwarding                    https://LIKN_QUE_QUE_NOS_DA/ -> http://localhost:8080                      
Connections                   ttl     opn     rt1     rt5     p50     p90          
                              0       0       0.00    0.00    0.00    0.00
//////////////////////////////
(CUIDADO: cerre la consola de ngrk y para abrila nuevamente ejecute este comando (ngrok http 8080 ) dandome otra direccion y ahora no anda ninguna de las 2)(PD lo cerre ejecutando control + c para copiar la salida y documentarla[y ahi rompi la primera instancia])

de aca usaremos el link de https
e iremos a github.com ingresaremos en nuestro repo y en setting agregaremos un nuevo webhook
hay link concatenarle el siguiente string "github-webhook/"
de tipo aplication json
dejar chekeado en just push event (que golpee la api cuando se realice un pull)
si vamos a la consola de ngrok veremos que se envio un "post 200 ok"
agregar la carpeta "angularWorkSpace" en "/home/osboxes/devops/jenkins/repo-devops3/" para publicarlo en el repo

cd /devops/jenkins/repo-devops3 (para alojarnos en el repo en disco)
git add . (para establecer que todo nuevo contenido se va a publicar)
git branch (para validar que estamos sobre la master)
git commit -m "se publicara el proyecto de angular"
git push -u origin master (nos pediras las credenciales del token)


############## TEST LAMP ###########################################################
############## TEST LAMP ###########################################################
TUTORIAL 

https://www.youtube.com/watch?v=v-r_12oezds

mkdir lamp-docker (creamos la nueva carpeta)
cd lamp-docker
git clone https://github.com/jersonmartinez/docker-lamp.git
cd docker-lamp (la carpeta que genera el repo)

####### OPCIONAL INSTALAR IDE visual studio code ###########

https://phoenixnap.com/kb/install-vscode-ubuntu
sudo snap install --classic code // SALIDA "code 695af097 from Visual Studio Code (vscode✓) installed"
code --version
######################

podemos acceder al codigo del LAMP para visualizar el proyecto
code . (para abrir la carpeta en el editor de codigo)

docker compose up -d (lo creara en background a los 3 contenedores)
docker ps



docker ps (visualizar contenedores corriendo)
localhost:80 (para ingresar al sitio ejemplo)
localhost:8000 (para ingresar al phpmyadmin) [credenciales del phpmyadmin = root - test]

192.168.1.47:80 es accesible desde la red
192.168.1.47:8000 es accesible desde la red

######### integrar Crashell como proyecto lamp en el contenedor multiple #####
https://www.crashell.com

cd www
ls -la (visualizar contenido del directorio)
git clone (https de algun repo que quieras usar)

docker compose down ( para deliminar todos los contenedores )
docker compose up -d (para volver a inicializar todo)
(recordar que los volumenes son externos, entonces la información por ejemplo de la base de datos ya no es volátil)
[archivos del ejemplo en archivos/docker-lamp-main]
############## FIN TEST LAMP ###########################################################


############ VOLVER A PRENDER JENKINS ############

### PRIMERO ELIMINAMOS TODO ######
docker ps -a (listar contenedores)
docker kill $(docker ps -q) (detener todos los contenedores)
docker system prune (eliminar todos los contenedores)
docker image ls (listar las imagenes)

(ya que todavia contamos con la imagen, vamos a realizar nuevamente el contenedor que fallo con las pruebas, al parecer usaban el mismo puerto)

docker run -d -p 8080:8080 -p 50000:50000 --name jenkins jenkins-cicd
docker logs jenkins (para sacar la clave inicializadora) "5897fb1dd7d94f78a0f829384e2e60d3"
localhost:8080 

docker start jenkins (prender un contenedor apagado, cuando instalas un plugin y queda exited)

######## PONER JENKINS en español #####
descargar el plugin locale, ir a configuración y poner forzar lenguaje y colocar "es"
######## FIN PONER JENKINS en español #####

link ngrok actual https://9a5f-179-36-157-250.ngrok-free.app/github-webhook/

despues de agregar el webhook ir a jenkins 
Panel de Control
Administrar Jenkins
System
GitHub
GitHub Servers

name => "cuenta personal"
API URL => "DEFAULT QUE APARECE"
en credenciales poner add jenkins
kind => secret text
scope => DEFAULT
secret => TOCKEN GIT
(colocar add y seleccionar el secret text guardado)
(hacer clic en test conection y le tiene que salir algo asi) // SALIDA "Credentials verified for user Braian-92, rate limit: 4998"
aplicar y guardar


crear una nueva tarea webhooks_pipeline de estilo libre
github proyect => https://github.com/Braian-92/repo-devops3 (url del repo, es la del navegador al ingresar)[ACLARO QUE NO ES LA https para clonar]

Configurar el origen del código fuente => git => https://github.com/Braian-92/repo-devops3.git [esta si es para clonar]
en credenciales agregamos nuevamente jenkins y agregamos
Kind => usuario y contraseña (usuario de tocken y tocken)
y la seleccionamos
dejar master
[activar] GitHub hook trigger for GITScm polling

en goals colocar "clean install"
y en advanced POM => "billing/pom.xml" (colocamos el directorio del archivo POM)
ya esta listo para realizar un build

ir a github.com a el repo y entrar con settings y Webhooks / Manage webhook (para visualizar las salidas que realizo en el historico)

al realizar un comit sobre la master el ngrok nos dara este mensaje
"POST /github-webhook/ 200 OK"
si vamos al visor del webhook del repo veremos este mansaje
"9e200e26-1a1c-11ee-8253-1c099215e698 push…2023-07-04 00:41:11"
si revisamos el pipeline compilo correctamente

//////////////// PROYECTO 2 jenkins github ######################
utilizando la tarea anterior editamos y desactivamos el siguiente campo
[desactivar] GitHub hook trigger for GITScm polling
ahora en git => Additional Behaviours => custom user email adress
user.name => jenkins
user.email => admin@admin.com
(esta cuenta es necesaria para informar quien fue el que realizo el push al repo)
luego en ejecutar donde se encuetra en pom de maven crear una nueva accion de shell ("Build Steps")
git branch (ver en el log en que rama esta)
git checkout master (para que nos traiga todos los cambios de la rama master)
git merge origin/feature/addtest (realizar un merge de la rama que estamos enviando)
(realizar una rama feature/addtest en github desktop )
cambiar en brach to build "*/master" por "origin/feature/addtest"

en "Acciones para ejecutar después."
Git Publisher (esto nos permite ejecutar comandos de git al repositorio remoto) 
  => checkear "Push Only If Build Succeeds" (solo hace el push si fue exitoso)
  Branches => 
    Branch to push => master
    Target remote name => origin
(aplicar y guardar)
ir al pipeline y en espacio de trabajo limpiar los residuos ("limpiar el espacio de trabajo")

vamos a la rama "feature/addtest" realizamos y comiteamos un cambio minimo
y creamos un pull request (esto nos enviara al sitio para colocar el mensaje y enviarlo github.com utilizando antes github desktop)

EJECUTAMOS

###################### SALIDA ###################
Branch 'master' set up to track remote branch 'master' from 'origin'.
+ git merge origin/feature/addtest
Updating a215b6f..7a5696c
Fast-forward
 test_webhook.txt | 3 ++-
 1 file changed, 2 insertions(+), 1 deletion(-)
The recommended git tool is: NONE
using credential fd404253-20e3-4016-a7ba-acfa2ed939ca
Pushing HEAD to branch master at repo origin
 > git --version # timeout=10
 > git --version # 'git version 2.30.2'
using GIT_ASKPASS to set credentials 
 > git push https://github.com/Braian-92/repo-devops3.git HEAD:master # timeout=10
Finished: SUCCESS
###############################################

si vamos a la master podremos validar que los cambios se mergearon correctamente

PAGINA PLUGINS JENKINS: https://plugins.jenkins.io/

##################### INTEGRACIÓN CON SLACK ###################

https://slack.com/intl/es-ar/ (registrarse)

crear cuenta (yo ingrese con google) y crear un nombre de organización 
ir a explorar slark => aplicaciones
buscamos jenkins CI
agregar => agregar slark => elegir el canal que creamos
add jenkins ci integration

vamos al dashboardde jenkins y en administrar plugins e instalamos "slak notification"