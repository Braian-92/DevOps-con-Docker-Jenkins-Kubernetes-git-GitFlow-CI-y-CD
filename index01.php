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

###### VOLUMENES ######

la creación de contenedores puede utilizar el disco por fuera de los contenedores, esto se realiza para poder eliminar el contenedor y no perder la información. Por ejemplo si estamos trabajando con una imagen que tiene una base de datos esta misma la podemos recrear la cantidad de veces que querramos y no se perdera la información que estemos guardando.
Esto lo aclaramos por que al recrear un contenedor necesitamos que el volumen se recree nuevamente ya que el creado no es funcional necesitamos verificar el directorio del volumen y eliminarlo manualmente ya que el generador de contenedores verifica que si existe no sera eliminado.

######### PROYECTO 02 docker java angular postgres #########
docker ps -a (listar contenedores)
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