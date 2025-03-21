import { Head } from '@inertiajs/react';

export default function Welcome({ dbInfo }) {
    return (
        <div className="min-h-screen bg-gray-100">
            <div className="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div className="px-4 py-6 sm:px-0">
                    <h1 className="text-3xl font-bold text-gray-900">
                        Bienvenido a Laravel con React y Oracle
                    </h1>
                    <p className="mt-4 text-gray-600">
                        Esta es una aplicación de ejemplo usando Laravel, React, Inertia.js y Oracle.
                    </p>

                    <div className="mt-8 bg-white shadow rounded-lg p-6">
                        <h2 className="text-xl font-semibold text-gray-900 mb-4">
                            Información de la Base de Datos
                        </h2>
                        
                        <div className="space-y-4">
                            <div className="flex items-center">
                                <span className="w-24 text-gray-600">Estado:</span>
                                <span className={`px-2 py-1 rounded-full text-sm ${
                                    dbInfo.connection === 'Conectado' 
                                        ? 'bg-green-100 text-green-800' 
                                        : 'bg-red-100 text-red-800'
                                }`}>
                                    {dbInfo.connection}
                                </span>
                            </div>

                            <div className="flex items-center">
                                <span className="w-24 text-gray-600">Versión:</span>
                                <span className="text-gray-900">{dbInfo.version}</span>
                            </div>

                            <div className="flex items-center">
                                <span className="w-24 text-gray-600">Host:</span>
                                <span className="text-gray-900">{dbInfo.host}</span>
                            </div>

                            <div className="flex items-center">
                                <span className="w-24 text-gray-600">Puerto:</span>
                                <span className="text-gray-900">{dbInfo.port}</span>
                            </div>

                            <div className="flex items-center">
                                <span className="w-24 text-gray-600">Base de datos:</span>
                                <span className="text-gray-900">{dbInfo.database}</span>
                            </div>

                            <div className="flex items-center">
                                <span className="w-24 text-gray-600">Usuario:</span>
                                <span className="text-gray-900">{dbInfo.username}</span>
                            </div>

                            {dbInfo.error && (
                                <div className="mt-4 p-4 bg-red-50 border border-red-200 rounded-md">
                                    <p className="text-red-800">{dbInfo.error}</p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
} 