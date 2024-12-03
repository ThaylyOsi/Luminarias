#Elaborado por: Luis Manuel Bermúdez
import sys 
def main(): 
    if len(sys.argv) > 1: 
        valor = sys.argv[1] 
        print(f"Valor recibido: {valor}") 
    else: 
        print("No se recibió ningún valor") 
if __name__ == "__main__": 
    main()