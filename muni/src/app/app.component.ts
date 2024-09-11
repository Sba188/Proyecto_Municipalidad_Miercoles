import { Component, OnInit } from '@angular/core';
import { DataService } from './data.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  datos: any[] = []; // Almacena los datos obtenidos
  nuevoDato = {username: '', email: '', lastname: ''};


  constructor(private dataService: DataService) {}

  ngOnInit(): void {
    this.obtenerDatos();
  }

  obtenerDatos(): void{
    this.dataService.obtenerDatos().subscribe(data => {
      this.datos = data;
    });
  }

  crearDatos():void{
    this.dataService.crearDatos(this.nuevoDato).subscribe(()=> {
      this.obtenerDatos();
      this.nuevoDato = {username: '', email: '', lastname: ''};
    })
  }

  eliminarDatos(id: number):void{
    this.dataService.eliminarDatos(id).subscribe(()=>{
      this.obtenerDatos();
    })
  }
}
