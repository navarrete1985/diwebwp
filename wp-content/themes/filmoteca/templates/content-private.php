  <?php 
    $user_id = wp_get_current_user()->ID;
    $user_info = get_userdata($user_id);
    $user_avatar = get_avatar_url($user->ID, 200);
    
    $args = [
      'exclude' => [$user_id],
      'orderby' => 'nicename'
    ];
    
    $users = get_users($args);
  ?>
  <div class="container clearfix">
    <div class='row mt-70 mb-30 d-flex flex-row-reverse'>
          <?= '<a href="' . wp_logout_url(get_permalink()) . '" class="btn oneMusic-btn mt-30">Cerrar Sesión</a>'; ?>
    </div>
    <div class='row mb-70'>
      <div class="people-list" id="people-list">
        <div class="search">
          <input type="text" placeholder="buscar" />
          <i class="fa fa-search"></i>
        </div>
        <ul class="list">
          <li class="clearfix">
            <img src="<?= $user_avatar ?>" alt="avatar" />
            <div class="about">
              <div class="name"><?= $user_info->user_nicename ?></div>
              <div class="status">
                <i class="fa fa-circle online"></i> en linea
              </div>
            </div>
          </li>
          <?php
            $status = [
              'online',
              'offline'=> [
                  'hace 10 minutos',
                  'hace 20 minutos',
                  'ayer',
                  'hace 2 días'
                ]
            ];
            $count = 0;
            foreach ($users as $item):
              $user_tmp = get_userdata($item->ID);
              $count++;
          ?>
            <li class="clearfix">
              <img src="<?= get_avatar_url($item->ID, 200) ?>" alt="avatar" />
              <div class="about">
                <div class="name"><?= $user_tmp->user_nicename ?></div>
                <div class="status">
                  <i class="fa fa-circle <?= $count % 2 == 0 ? 'offline' : 'online' ?>"></i> <?= $count % 2 === 0 ? $status['offline'][$count % 4] : 'en linea' ?>
                </div>
              </div>
            </li>
            
          <?php endforeach; ?>
          
        </ul>
      </div>
      
      <div class="chat">
        <div class="chat-header clearfix">
          <img src="<?= $user_avatar ?>" alt="avatar" />
          <div class="chat-about">
            <div class="chat-with">Chat de  <?= $user_info->user_nicename ?></div>
            <div class="chat-num-messages">Conectados 1 902 mensajes</div>
          </div>
          <i class="fa fa-star"></i>
        </div> <!-- end chat-header -->
        
        <div class="chat-history">
          <ul>
            <li class="clearfix">
              <div class="message-data align-right">
                <span class="message-data-time" >10:10 AM, Today</span> &nbsp; &nbsp;
                <span class="message-data-name" ><?= $user_info->user_nicename ?></span> <i class="fa fa-circle me"></i>
                
              </div>
              <div class="message other-message float-right">
                Hola <?= $user_tmp->user_nicename ?>, ¿cómo estás? ¿Qué estás pensando hacer hoy?
              </div>
            </li>
            
            <li>
              <div class="message-data">
                <span class="message-data-name"><i class="fa fa-circle online"></i> <?= $user_tmp->user_nicename ?></span>
                <span class="message-data-time">10:12 AM, Today</span>
              </div>
              <div class="message my-message">
                Voy a intentar hacer una review de la película que ayer vi en el cine, a ver si la puedo publicar hoy.<br>¿Que piensas sobre eso?
              </div>
            </li>
            
            <li class="clearfix">
              <div class="message-data align-right">
                <span class="message-data-time" >10:14 AM, Today</span> &nbsp; &nbsp;
                <span class="message-data-name" ><?= $user_info->user_nicename ?></span> <i class="fa fa-circle me"></i>
                
              </div>
              <div class="message other-message float-right">
                Está bien, tenemos que darnos caña que la gente está esperando noticias nuevas nuestras, no podemos descuidar el blog.
              </div>
            </li>
            
            <li>
              <div class="message-data">
                <span class="message-data-name"><i class="fa fa-circle online"></i> <?= $user_tmp->user_nicename ?></span>
                <span class="message-data-time">10:20 AM, Today</span>
              </div>
              <div class="message my-message">
                Perfecto, voy a ponerme manos a la obra para intentar publicarla hoy mismo.
              </div>
            </li>
            
            <li>
              <div class="message-data">
                <span class="message-data-name"><i class="fa fa-circle online"></i> <?= $user_tmp->user_nicename ?></span>
                <span class="message-data-time">10:31 AM, Today</span>
              </div>
              <i class="fa fa-circle online"></i>
              <i class="fa fa-circle online" style="color: #AED2A6"></i>
              <i class="fa fa-circle online" style="color:#DAE9DA"></i>
            </li>
            
          </ul>
          
        </div> <!-- end chat-history -->
        
        <div class="chat-message clearfix">
          <textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>
                  
          <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
          <i class="fa fa-file-image-o"></i>
          
          <button>Enviar</button>
  
        </div> <!-- end chat-message -->
        
      </div> <!-- end chat -->
    </div>
  </div> <!-- end container -->

<script id="message-template" type="text/x-handlebars-template">
  <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
      <span class="message-data-name" ><?= $user_info->user_nicename ?></span> <i class="fa fa-circle me"></i>
    </div>
    <div class="message other-message float-right">
      {{messageOutput}}
    </div>
  </li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
  <li>
    <div class="message-data">
      <span class="message-data-name"><i class="fa fa-circle online"></i> <?= $user_tmp->user_nicename ?></span>
      <span class="message-data-time">{{time}}, Today</span>
    </div>
    <div class="message my-message">
      {{response}}
    </div>
  </li>
</script>
