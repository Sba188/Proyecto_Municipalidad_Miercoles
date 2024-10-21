import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AutentificacionModule } from './modules/autentificacion/autentificacion.module';

const routes: Routes = [
  {
    path: '',
    loadChildren: () =>
      import('./modules/autentificacion/autentificacion.module').then(
        (m) => m.AutentificacionModule
      ),
  },
  
  {
    path:'',
    loadChildren: () =>
      import('./modules/admin/admin.module').then((m) => m.AdminModule),
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
