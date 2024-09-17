import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs'; // Importa Observable para manejar las respuestas de forma reactiva

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {

  private apiUrl = 'http://localhost/api/api.php'; // URL de la API en PHP

  constructor(private http: HttpClient) {} // Inyecta el servicio HttpClient

  // Método para obtener todos los usuarios
  getUsuarios(): Observable<any> {
    return this.http.get(this.apiUrl); // Realiza una solicitud GET a la API
  }

  // Método para crear un nuevo usuario
  crearUsuario(usuario: any): Observable<any> {
    return this.http.post(this.apiUrl, usuario); // Realiza una solicitud POST a la API enviando los datos del usuario
  }

  // Método para actualizar un usuario
  actualizarUsuario(usuario: any): Observable<any> {
    return this.http.put(this.apiUrl, usuario); // Realiza una solicitud PUT a la API para actualizar el usuario
  }

  // Método para eliminar un usuario
  eliminarUsuario(id: number): Observable<any> {
    return this.http.delete(this.apiUrl + `?id=${id}`); // Realiza una solicitud DELETE a la API para eliminar el usuario
  }
}
