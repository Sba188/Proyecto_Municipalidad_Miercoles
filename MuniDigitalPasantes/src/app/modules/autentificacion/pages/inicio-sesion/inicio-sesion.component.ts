import { Component } from '@angular/core';

@Component({
  selector: 'app-inicio-sesion',
  templateUrl: './inicio-sesion.component.html',
  styleUrls: ['./inicio-sesion.component.css']
})
export class InicioSesionComponent {

  hide: boolean = true; // Para ocultar/mostrar la contraseña
  usuarioIngresado = {
    email: '',
    password: ''
  };

  // Datos de usuario simulados
  usuarios = [
    { email: 'florencialocacciato@gmail.com', password: '123456' }, 
    { email: 'mili@gmail.com', password: 'abcdef' }  
  ];

  iniciarSesion() {
    const usuarioEncontrado = this.usuarios.find(usuario => 
      usuario.email === this.usuarioIngresado.email && 
      usuario.password === this.usuarioIngresado.password
    );

    if (usuarioEncontrado) {
      console.log('Inicio de sesión exitoso:', usuarioEncontrado);
      alert('Inicio de sesión exitoso');
      // Aquí puedes redirigir al usuario o guardar el estado de autenticación
    } else {
      console.error('Error en inicio de sesión');
      alert('Credenciales incorrectas. Intenta nuevamente.');
    }
  }

}
