import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';

import { ConfiguracionesRoutingModule } from './configuraciones-routing.module';
import { UsuarioComponent } from './component/usuario/usuario.component';
import { GrupoComponent } from './component/grupo/grupo.component';


@NgModule({
  declarations: [
    UsuarioComponent,
    GrupoComponent
  ],
  imports: [
    CommonModule,
    ConfiguracionesRoutingModule,
    ReactiveFormsModule
  ]
})
export class ConfiguracionesModule { }
