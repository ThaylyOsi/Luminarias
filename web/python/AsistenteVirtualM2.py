# ESTE MODULO ES NUEVO POR CRIS


import pyttsx3
import speech_recognition as sr     #Utiliza la libreria de reconocimiento de voz
import pygame
#from playsound import playsound

# Instalar pip install pyttsx3, luego python -m pip install SpeechRecognition, finalmente pip install pyaudio
# Python 3.9.6

# Modificado por: Cristian, Thayly, Brandon

#pip install playsound

import webbrowser       #Libreria para abrir páginas web    
#import serial
import time
import os
import requests  # Añade esta línea para importar requests
# Función para enviar un comando al Arduino
#ser=serial.Serial('COM6', 9600)
#def enviar_comando(comando):
 #   ser.write(comando.encode())
  #  time.sleep(s)

# Establecer el directorio de trabajo al directorio del script
script_dir = os.path.dirname(os.path.abspath(__file__))
os.chdir(script_dir)

# Guardar el PID en un archivo
pid_file = os.path.join(script_dir, 'assistant_pid.txt')
with open(pid_file, 'w') as f:
    f.write(str(os.getpid()))

# Archivo de señal para detener el asistente
stop_signal_file = os.path.join(script_dir, 'stop_signal.txt')


# Establecer el directorio de trabajo al directorio del script
script_dir = os.path.dirname(os.path.abspath(__file__))
os.chdir(script_dir)


r = sr.Recognizer()
#Configuración de la voz
engine = pyttsx3.init()
engine.setProperty('rate', 155)
engine.setProperty('voice', 'HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Speech\Voices\Tokens\MSTTS_V110_esMX_RaulMM')
engine.setProperty('volume', 1)

def decirVozAlta(escuchando):
    engine.say(escuchando)
    print(escuchando)
    engine.runAndWait()

def enviar_senal_cerrar():
    try:
        requests.get("http://localhost/proyecto1/index.php?r=site/close-endpoint" )  # Ajusta la URL según tu configuración
    except requests.RequestException as e:
        print(f"Error al enviar la señal de cierre: {e}")

#playsound(r"C:\Users\iran1\OneDrive\Documentos\Cerro Azul\7. Septimo Semestre\Inteligencia Artificial\TEMA 3\NetflixAudio.mp3")    
#def cargar_recursos():
 #   pygame.mixer.init()
 #   pygame.mixer.music.set_volume(1.0)  # Asegúrate de que el volumen está al máximo
 #   try:
 #       pygame.mixer.music.load("C:/xampp/htdocs/Audio3.wav")
 #       pygame.mixer.music.play()
 #       while pygame.mixer.music.get_busy():  # Espera hasta que el audio termine de reproducirse
 #          time.sleep(1)
  #  except pygame.error as e:
  #      print(f"Error al cargar o reproducir el audio: {e}")

#cargar_recursos()

#texto = "Cargando Recursos"
#decirVozAlta(texto)
activo = True
usuario = ""


texto = "Saludos, soy tu asistente virtual Anthony. ¿En qué te puedo ayudar? "
decirVozAlta(texto)
activo = True
x=1
while(activo):                      
    with sr.Microphone() as microfono:
        r.adjust_for_ambient_noise(microfono, duration=1)  # Ajusta el nivel de energía basado en el ruido de fondo
        print (x)
        audio = r.listen(microfono, phrase_time_limit=8)
        try:
            text = r.recognize_google(audio, language="es-MX")
            print('Has dicho: {}'.format(text))
            #La base de conocimiento, debe de coincidir con la semántica, sintaxis correcta
            #Palabras clave seleccionadas.
           # base_de_conocimiento = open("BaseConocimientoMF.pl")
           # with base_de_conocimiento as obtener_lineas:
            #    lineas_base_de_conocimiento = obtener_lineas.readlines()
            
            base_de_conocimiento_path = os.path.join(script_dir, "BaseConocimientoMF.pl")
            with open(base_de_conocimiento_path, 'r') as base_de_conocimiento:
                lineas_base_de_conocimiento = base_de_conocimiento.readlines()

            for linea in lineas_base_de_conocimiento:
                #print(linea.rstrip())
                
                accion = linea.rsplit("(")
                agente = accion[1].rsplit(",")
                objeto = agente[1].rsplit(")")
                
                #print(agente[0]+'-'+accion[0]+'-'+objeto[0])
                
                if agente[0] in text.title():
                    if accion[0] in text.title():
                        if objeto[0] in text.title():
                            if objeto[0] == "Google":
                                decirVozAlta(usuario + " voy ha abrir "+ objeto[0])
                                webbrowser.open('http://google.com')
                            if objeto[0] == "Gmail":
                                webbrowser.open('http://gmail.com') 
                                decirVozAlta(usuario + " voy ha abrir "+ objeto[0])   
                            if objeto[0] == "Programa":
                                activo=False
                            if accion[0]=='Encendido' and 'Encendido' in text.title(): 
                                if objeto[0] in ["Total"]: 
                                  #  enviar_comando("encendido_total") 
                                    decirVozAlta("Luminarias encendidas")
                            if accion[0]=='Apagado' and 'Apagado' in text.title():
                                if objeto[0] in ["Total"]:
                                   decirVozAlta("Luminarias apagadas")
                                    
                            

                            break
                             

                elif "Salir" in text.title() or "salir" in text.title() or "terminar" in text.title():
                    activo = False
                    enviar_senal_cerrar()  # Envía la señal para cerrar la ventana
                    break

               
        except:
            decirVozAlta('Repetir, por favor')
        x=x+1
texto ="Adios, nos vemos"
decirVozAlta(texto)

# Cierra el puerto serial
#ser.close()

# Eliminar el archivo PID y el archivo de señal al finalizar
if os.path.exists(pid_file):
    os.remove(pid_file)
if os.path.exists(stop_signal_file):
    os.remove(stop_signal_file)