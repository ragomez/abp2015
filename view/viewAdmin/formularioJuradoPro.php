<div class="tab">
        <input type="radio" id="tab-2" name="tab-group-1">
        <label for="tab-2">Tab 2</label>
        <div class="content">
              <!--contenido de la pesta–a 2-->
          <section class="contact" id="contact">
            <!-- idJuradoProfesional, login, password, dni, nombre , apellidos,telefono,tipo-->
            <div class="container w960">
              <div class="row">                             
                <h2>Formulario de registro de establecimiento</h2>               
                <form method="post" action="index.php?controller=users&action=register" >
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Login" name="login">                  
                  </div>                 
                  <div class="form-group">
                    <input name="dni" class="contact col-md-6" placeholder="Dni" type="text">
                  </div>
                  <div class="form-group">
                    <input name="nombre" class="contact col-md-6" placeholder="Nombre" type="text">
                  </div>
                  <div class="form-group">
                    <input name="apellidos" class="contact noMarr col-md-6" placeholder="Apellidos" type="text">
                  </div>                
                  <div class="form-group">
                    <input name="telefono" class="contact noMarr col-md-6" placeholder="Telefono" type="text">
                  </div>
                  <div class="form-group">
                    <input name="tipo" type="hidden" value="Jurado profesional">
                  </div>
                  <div class="form-group">        
                      <input type="password" class="form-control" placeholder="password" name="password">                      
                  </div>
                  <div class="form-group">
                    <input id="submit" class="contact submit" value="Registrarse" type="submit">
                  </div>
                </form>
              </div >
              </div>
            </div>
          </section>
            

        </div>
    </div>