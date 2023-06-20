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

CTRL + c despues de un rato corta el servicio


docker image ls (listar imagenes)
docker ps -a (listar los contenedores)
docker start billingapp (inicializar contenedor)
docker logs billingapp (ver logs del contenedor)
docker stop billingapp (detener el contenedor)
docker image rm sotobotero/udemy-devops:0.0.1 (eliminar imagen)