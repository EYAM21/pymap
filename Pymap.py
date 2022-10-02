# -*- coding: cp1252 -*-
# PYMAP V1.0
# Autor: Hidden-Hat
    
print("@@@@@@@@@@@@@@@@@@@@@@@@&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&&&@@@@@@@@@@@@")
print("@@@####################&@@@##################@@%######%@@&&&&@@#######&@@")
print("@@@######################@@##################@@%######%@@&&&&@@#######&@@")
print("@@@######################@@##################@@%######%@@&&&&@@#######&@@")
print("@@@@@@@@@@@@@@@@@@#######@@#######@@@@@@@@@@@@@%######%@@&&&&@@#######&@@")
print("&&&@@@@@@@@@@@@@@@#######@@#######@@@@@@@@@@@@@%######%@@@@@@@@#######&@@")
print("&@@%#####################@@################@@@@%######################&@@")
print("@@&#####################%@@################@@@@%######################&@@")
print("@@%###################@@@@@################@@@@%######################&@@")
print("@@%######&@@@@@@@@@@@@@@@@@#######@@@@@@@@@@@@@%######%@@@@@@@@#######&@@")
print("@@%######################@@#######@@@@@@@@@@@@@%######%@@@@//@@#######&@@")
print("@@%######################@@#######@@@@@@@@@@@@@%######%@@@@@@@@#######&@@")
print("@@%######################@@#######@@@%%%%%&@@@@%######%@@@@@@@@#######&@&")
print("@@&%%%%%%%%%%%%%%%%%%%%%%@@%%%%%%%@@@%%%%%%%%@@&%%%%%%&@@@@@@@@%%%%%%%&@&")
print("------------------------Pymap V10 By Hidden-Hat--------------------------")

print("\nPara utilizar la herramienta, debe tener instalados los siguientes requerimientos: ")
print("\nnmap,python-nmap")

print("\n¿desea instalar los requerimientos?[Y/N]\n")

resp = input()
resp_mayus = resp.upper()

if resp_mayus == "Y":

    print("\nseleccione su sistema operativo\n")
    print("Windows [01]")
    print("Linux   [02]")
    
    so = input()
    if so == "01":
       
        print("\nPara instalar la libreria python-nmap, introdusca la siguiente linea de comando en cmd: pip3 install -r requirements.txt\n")
        
        print("\n-------------------------------------------------...\Descargando Nmap/...-----------------------------------------------")
        import wget
        url = "https://nmap.org/dist/nmap-7.91-setup.exe"
        wget.download(url, 'C:/Users/Public/Downloads/nmap-7.91-setup.exe')
        
        print("\n\nNmap descargado con exito en C:/Users/Public/Downloads, porfavor realice la instalación para continuar.\n")
        print("Una vez haya instalado el ejecutable y los requerimientos,ya podrá utilizar la herramienta sin problemas ;)")
    elif so == "02":
        print("para instalar la libreria python-nmap, ejecute la siguiente linea: pip3 install -r requirements.txt ")
        print("\npara instalar o actualizar nmap, ejecute la siguiente linea: ./requirements.sh")
        print("\nY ya podrá utilizar la herramienta sin problemas ;)")
    else:
        print("La opción ingresada no es valida.")
elif resp_mayus == "N":

    print("\nseleccione su sistema operativo")
    print("Windows [01]")
    print("Linux   [02]")

    sc = input()

    if sc == "01":


        print("\n¿Que desea hacer?\n")
        print("Escaneo de puertos [01]\n")
        print("Informe de vulnerabilidad(cve) [02]\n")
        print("Obtener todos los hosts [03]\n")
        print("Conocer dirección IP de algún sitio [04]\n")

    
        elec = input()
        if elec == "01":

            import nmap

            import webbrowser

            print("\nIngresa la dirección IP o la página web que quieres escanear: ")
            print("www.example.com o 168.192.0.1\n")
            ip = input()

            nm = nmap.PortScanner()
            nm.scan(hosts=ip, arguments="--top-ports 1000 -sV --version-intensity 3")
            output = nm.get_nmap_last_output()
            xml = open("c:\\AppServ\\www\\Pymap\\output\\output.xml", "w")
            xml.write(output)
            xml.close()

            print("\nEl escaneo ha sido completado, la información ha sido guardada dentro de la carpeta output.\n")
            print("para revisar la información carge su salida en la siguiente página : \n")
            print("http://localhost/Pymap/form/form.php")
            webbrowser.open("http://localhost/Pymap/form/form.php")
                
        elif elec == "02":
        
            import nmap

            import webbrowser

            print("Ingresa la dirección IP o la página web que quieres escanear: ")
            print("www.example.com o 168.192.0.1\n")

            ip2 = input()

            nm2 = nmap.PortScanner()
            nm2.scan(hosts=ip2, arguments="-sV --script vuln")
            output2 = nm2.get_nmap_last_output()
            xml2 = open("c:\\AppServ\\www\\Pymap\\output\\output2.xml", "w")
            xml2.write(output2)
            xml2.close()

            print("\nEl escaneo ha sido completado, la información ha sido guardada dentro de la carpeta output.\n")
            print("para revisar la información carge su salida en la siguiente página : \n")
            print("http://localhost/Pymap/form/form.php")
            webbrowser.open("http://localhost/Pymap/form/form.php")
        
        elif elec == "03":

            import nmap

            import webbrowser

            print("Ingresa la dirección IP que quieres escanear en el siguiente formato: \n")
            print("168.192.0.1 ===> 168.192.0.0/24\n")

            ip3 = input()

            nm3 = nmap.PortScanner()
            nm3.scan(hosts=ip3, arguments="-sV")
            output3 = nm3.get_nmap_last_output()
            xml3 = open("c:\\AppServ\\www\\Pymap\\output\\output3.xml", "w")
            xml3.write(output3)
            xml3.close()

            print("\nEl escaneo ha sido completado, la información ha sido guardada dentro de la carpeta output.\n")
            print("para revisar la información carge su salida en la siguiente página : \n")
            print("http://localhost/Pymap/form/form.php")
            webbrowser.open("http://localhost/Pymap/form/form.php")

        elif elec == "04":

            import socket
            import nmap

            nm4 = nmap.PortScanner()

            print("Ingresa una página web para obtener su dirección IP: \n")
            print("www.example.com\n")

            pw = input()



            dt = socket.gethostbyname(pw)

            nm4.scan(hosts=dt)



            print("\nLa IP es: %s" %dt)

            print("\nEstado de la maquina: ", nm4[dt].state())

        else:

            print("Porfavor, escoja una opción valida.")
        
        
    elif sc == "02":

        print("\n¿Que desea hacer?\n")
        print("Escaneo de puertos [01]\n")
        print("Informe de vulnerabilidad(cve) [02]\n")
        print("Obtener todos los hosts [03]\n")
        print("Conocer dirección IP de algún sitio [04]\n")

    
        elec = input()
        if elec == "01":

            import nmap

            import webbrowser

            print("Ingresa la dirección IP o la página web que quieres escanear: ")
            print("www.example.com o 168.192.0.1\n")
            ip = input()

            nm = nmap.PortScanner()
            nm.scan(hosts=ip, arguments="--top-ports 1000 -sV --version-intensity 3")
            output = nm.get_nmap_last_output()
            xml = open("/home/Pymap/output/output.xml", "w")
            xml.write(output)
            xml.close()

            print("\nEl escaneo ha sido completado, la información ha sido guardada dentro de la carpeta output.\n")
            print("para revisar la información carge su salida en la siguiente página : \n")
            print("http://localhost/Pymap/form/form.php")
            webbrowser.open("http://localhost/Pymap/form/form.php")
        
        elif elec == "02":
        
            import nmap

            import webbrowser

            print("Ingresa la dirección IP o la página web que quieres escanear: ")
            print("www.example.com o 168.192.0.1\n")

            ip2 = input()

            nm2 = nmap.PortScanner()
            nm2.scan(hosts=ip2, arguments="-sV --script vuln")
            output2 = nm2.get_nmap_last_output()
            xml2 = open("/home/Pymap/output/output2.xml", "w")
            xml2.write(output2)
            xml2.close()

            print("\nEl escaneo ha sido completado, la información ha sido guardada dentro de la carpeta output.\n")
            print("para revisar la información carge su salida en la siguiente página : \n")
            print("http://localhost/Pymap/form/form.php")
            webbrowser.open("http://localhost/Pymap/form/form.php")
        
        elif elec == "03":

            import nmap

            import webbrowser

            print("Ingresa la dirección IP que quieres escanear en el siguiente formato: \n")
            print("168.192.0.1 ===> 168.192.0.0/24\n")

            ip3 = input()

            nm3 = nmap.PortScanner()
            nm3.scan(hosts=ip3, arguments="-sV")
            output3 = nm3.get_nmap_last_output()
            xml3 = open("/home/Pymap/output/output3.xml", "w")
            xml3.write(output3)
            xml3.close()

            print("\nEl escaneo ha sido completado, la información ha sido guardada dentro de la carpeta output.\n")
            print("para revisar la información carge su salida en la siguiente página : \n")
            print("http://localhost/Pymap/form/form.php")
            webbrowser.open("http://localhost/Pymap/form/form.php")

        elif elec == "04":

            import socket
            import nmap

            nm4 = nmap.PortScanner()

            print("Ingresa una página web para obtener su dirección IP: \n")
            print("www.example.com\n")

            pw = input()



            dt = socket.gethostbyname(pw)

            nm4.scan(hosts=dt)



            print("\nLa IP es: %s" %dt)

            print("\nEstado de la maquina: ", nm4[dt].state())

        else:

            print("Porfavor, escoja una opción valida.")

        
   

else:
    print("porfavor, seleccione una opción valida.")







  
