import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AutentificacionModule } from './modules/autentificacion/autentificacion.module';
import { InicioSesionComponent } from './modules/autentificacion/pages/inicio-sesion/inicio-sesion.component';

const routes: Routes = [
  {
    path:"", component: InicioSesionComponent
    //loadChildren:()=>import('./modules/autentificacion/autentificacion.module').then(m=>m.AutentificacionModule)
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
