import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DataService {
  private apiUrl = 'http://localhost/muni/src/backend/crud.php'; // Cambia esto a la URL de tu script PHP

  constructor(private http: HttpClient) { }

  obtenerDatos(): Observable<any>{
    return this.http.get(this.apiUrl);
  }

  crearDatos(datos:any): Observable<any>{
    return this.http.post(this.apiUrl,datos);
  }

  eliminarDatos(id:number):Observable<any>{
    return this.http.delete(`${this.apiUrl}?id=${id}`);
 }


}
