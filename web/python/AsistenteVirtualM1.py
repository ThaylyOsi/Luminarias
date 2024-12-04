# ESTE MODULO ES NUEVO POR CRIS


import pyttsx3
import speech_recognition as sr     #Utiliza la libreria de reconocimiento de voz
# Instalar pip install pyttsx3, luego python -m pip install SpeechRecognition, finalmente pip install pyaudio
# Python 3.9.6

# Modificado por: Cristian, Thayly, Brandon

#pip install audio-denoiser
#noisereduce
#python-noise-cancellation

import webbrowser       #Libreria para abrir páginas web    
import serial
import time

# Función para enviar un comando al Arduino
ser=serial.Serial('COM6', 9600)
def enviar_comando(comando):
    ser.write(comando.encode())
    time.sleep(s)


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
            text = r.recognize_google(audio, language="es-ES")
            print('Has dicho: {}'.format(text))
            #La base de conocimiento, debe de coincidir con la semántica, sintaxis correcta
            #Palabras clave seleccionadas.
            base_de_conocimiento = open("BaseConocimientoMF.pl")
            with base_de_conocimiento as obtener_lineas:
                lineas_base_de_conocimiento = obtener_lineas.readlines()
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
                                decirVozAlta(usuario + " abriendo "+ objeto[0])
                                webbrowser.open('http://google.com')
                            if objeto[0] == "Gmail":
                                webbrowser.open('http://gmail.com') 
                                decirVozAlta(usuario + " abriendo "+ objeto[0])   
                            if objeto[0] == "Programa":
                                activo=False
                            if accion[0]=='Encendido' and 'Encendido' in text.title(): 
                                if objeto[0] in ["Total"]: 
                                    enviar_comando("encendido_total") 
                                    decirVozAlta("Luminarias encendidas")
                            if accion[0]=='Apagado' and 'Apagado' in text.title():
                                if objeto[0] in ["Total"]:
                                    enviar_comando("apagado_total")
                                    decirVozAlta("Luminarias apagadas")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sanitarios", "Sanitario"]: 
                                    enviar_comando("encender_sanitarios") 
                                    decirVozAlta("Luminarias encendidas")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sanitarios", "Sanitario"]:
                                    enviar_comando("apagar_sanitarios")
                                    decirVozAlta("Luminarias apagadas")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Uno", "Sector 1", "Lc1", "Ls1"]: 
                                    decirVozAlta("Muy bien "+ usuario) 
                                    enviar_comando("encender_LC1")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Uno", "Sector 1", "Lc1", "Ls1"]:
                                    enviar_comando("apagar_LC1")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Dos", "Sector 2", "Lc2", "Ls2"]: 
                                    enviar_comando("encender_LC2") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Dos", "Sector 2", "Lc2", "Ls2"]:
                                    enviar_comando("apagar_LC2")
                                    print("Led apagado")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Tres", "Sector 3", "Lc3", "Ls3"]: 
                                    enviar_comando("encender_LC3") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Tres", "Sector 3", "Lc3", "Ls3"]:
                                    enviar_comando("apagar_LC3")
                                    print("Led apagado")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Cuatro", "Sector 4", "Lc4", "Ls4"]: 
                                    enviar_comando("encender_LC4") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Cuatro", "Sector 4", "Lc4", "Ls4"]:
                                    enviar_comando("apagar_LC4")
                                    print("Led apagado")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Cinco", "Sector 5", "Lc5", "Ls5"]: 
                                    enviar_comando("encender_LC5_total") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Cinco", "Sector 5", "Lc5", "Ls5"]:
                                    enviar_comando("apagar_LC5_total")
                                    print("Led apagado") 
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Cinco Primero","Sector 5 Primero", "Lc5 Primero", "Ls5 Primero"]: 
                                    enviar_comando("encender_LC5_1") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Cinco Primero","Sector 5 Primero", "Lc5 Primero", "Ls5 Primero"]:
                                    enviar_comando("apagar_LC5_1")
                                    print("Led apagado")   
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Cinco Segundo","Sector 5 Segundo", "Lc5 Segundo", "Ls5 Segundo"]: 
                                    enviar_comando("encender_LC5_2") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Cinco Segundo","Sector 5 Segundo", "Lc5 Segundo", "Ls5 Segundo"]:
                                    enviar_comando("apagar_LC5_2")
                                    print("Led apagado")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Cinco Tercero","Sector 5 Tercero", "Lc5 Tercero", "Ls5 Tercero"]: 
                                    enviar_comando("encender_LC5_3") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Cinco Tercero","Sector 5 Tercero", "Lc5 Tercero", "Ls5 Tercero"]:
                                    enviar_comando("apagar_LC5_3")
                                    print("Led apagado")         
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Sector Seis", "Sector 6", "Lc6", "Ls6"]: 
                                    enviar_comando("encender_LC6") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Sector Seis", "Sector 6", "Lc6", "Ls6"]:
                                    enviar_comando("apagar_LC6")
                                    print("Led apagado")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Pasillos", "Pasillo"]: 
                                    enviar_comando("encender_pasillos") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Pasillos", "Pasillo"]:
                                    enviar_comando("apagar_pasillos")
                                    print("Led apagado")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Jefatura"]: 
                                    enviar_comando("encender_jefatura") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Jefatura"]:
                                    enviar_comando("apagar_jefatura")
                                    print("Led apagado")
                            if accion[0]=='Encender' and 'Encender' in text.title(): 
                                if objeto[0] in ["Oficinas", "Oficina"]: 
                                    enviar_comando("encender_oficina") 
                                    print("Led encendido")
                            if accion[0]=='Apagar' and 'Apagar' in text.title():
                                if objeto[0] in ["Oficinas", "Oficina"]:
                                    enviar_comando("apagar_oficina")
                                    print("Led apagado")

                            break
                             

                elif "Salir" in text.title():
                    activo=False
                    break
                elif "salir" in text.title():
                    activo=False
                    break
        except:
            decirVozAlta('')
        x=x+1
texto ="Hasta pronto, fue un gusto ser de ayuda"
decirVozAlta(texto)

# Cierra el puerto serial
ser.close()