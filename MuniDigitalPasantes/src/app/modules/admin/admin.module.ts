import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AdminRoutingModule } from './admin-routing.module';
import { GruposComponent } from './grupos/grupos.component';

import {MatTableModule} from '@angular/material/table';
import { FormsModule } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { UsuarioComponent } from './usuario/usuario.component';

@NgModule({
  declarations: [
    GruposComponent,
    UsuarioComponent
  ],
  imports: [
    CommonModule,
    AdminRoutingModule,
    MatTableModule,
    FormsModule,
    ReactiveFormsModule,
  ],
  exports:[GruposComponent],
})
export class AdminModule { }
