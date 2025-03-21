#!/bin/bash

# Función para verificar si un archivo existe
check_file() {
    if [ -f "$1" ]; then
        echo "✅ $1 existe"
        return 0
    else
        echo "❌ $1 NO existe"
        return 1
    fi
}

# Función para verificar si un directorio existe
check_dir() {
    if [ -d "$1" ]; then
        echo "✅ $1 existe"
        return 0
    else
        echo "❌ $1 NO existe"
        return 1
    fi
}

echo "🔍 Validando instalación de Oracle Instant Client..."

# Verificar directorios principales
check_dir "/usr/lib/oracle/23/client64"
check_dir "/usr/lib/oracle/23/client64/lib"
check_dir "/usr/include/oracle/23/client64"

# Verificar archivos de librería
check_file "/usr/lib/oracle/23/client64/lib/libclntsh.so"
check_file "/usr/lib/oracle/23/client64/lib/libocci.so"
check_file "/usr/lib/oracle/23/client64/lib/libclntsh.so.23.1"
check_file "/usr/lib/oracle/23/client64/lib/libocci.so.23.1"

# Verificar archivos de encabezado
check_file "/usr/include/oracle/23/client64/oci.h"
check_file "/usr/include/oracle/23/client64/ociap.h"
check_file "/usr/include/oracle/23/client64/ocidfn.h"

# Verificar variables de entorno
echo -e "\n🔍 Verificando variables de entorno..."
env | grep -E "ORACLE|OCI|LD_LIBRARY_PATH"

# Verificar permisos
echo -e "\n🔍 Verificando permisos..."
ls -l /usr/lib/oracle/23/client64/lib/libclntsh.so*
ls -l /usr/lib/oracle/23/client64/lib/libocci.so*
ls -l /usr/include/oracle/23/client64/oci.h 