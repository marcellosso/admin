<?php $pi_arq = pathinfo($_SERVER['REQUEST_URI']); ?>
<div class="sidebar content-box nav" style="display: block;">
<ul class="nav">
    <!-- Main menu -->
    <li><img src="./images/logo_h.jpg" height="70" style="margin-bottom:30px;"/></li>
    <li><a href="index.php"     class="<?php echo ((in_array($pi_arq['filename'],array('index')))?'sel':''); ?>"><i class="fas fa-home"></i> Dashboard</a></li>
    <li><a href="usuarios.php"  class="<?php echo ((in_array($pi_arq['filename'],array('usuarios','incluir-usuario')))?'sel':''); ?>"><i class="fa fa-users"></i> Usuários</a></li>
    <li><a href="series.php"    class="<?php echo ((in_array($pi_arq['filename'],array('series','incluir-serie','alterar-serie')))?'sel':''); ?>"><i class="fas fa-sort-numeric-up"></i> Séries</a></li>
    <li><a href="materias.php"  class="<?php echo ((in_array($pi_arq['filename'],array('materias','incluir-materia','alterar-materia')))?'sel':''); ?>"><i class="fas fa-book"></i> Matérias</a></li>
    <li><a href="questoes.php"  class="<?php echo ((in_array($pi_arq['filename'],array('questoes','incluir-questao','alterar-questao')))?'sel':''); ?>"><i class="fas fa-tasks"></i> Questões</a></li>
    <li><a href="loja.php"      class="<?php echo ((in_array($pi_arq['filename'],array('loja','incluir-produto','alterar-produto','incluir-categoria-prod','alterar-categoria-prod')))?'sel':''); ?>"><i class="fas fa-store"></i> Loja</a></li>
    <li><a href="ajuda.php"     class="<?php echo ((in_array($pi_arq['filename'],array('ajuda','incluir-ajuda','alterar-ajuda')))?'sel':''); ?>"><i class="fas fa-question"></i> Ajuda</a></li>
<!--    <li><a href="plano.php"     class="--><?php //echo ((in_array($pi_arq['filename'],array('plano','incluir-plano','alterar-plano')))?'sel':''); ?><!--"><i class="fas fa-clipboard-list"></i> Plano</a></li>-->
    <li><a href="pedido.php"   class="<?php echo ((in_array($pi_arq['filename'],array('pedido','incluir-pedido','alterar-pedido')))?'sel':''); ?>"><i class="fas fa-clipboard-list"></i> Pedidos</a></li>
    <li><a href="logout.php"    class="<?php echo ((in_array($pi_arq['filename'],array('logout')))?'sel':''); ?>"><i class="fas fa-sign-in-alt"></i> Sair</a></li>

    <!-- <li><a href="usuarios.php"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
    <li><a href="stats.php"><i class="glyphicon glyphicon-stats"></i> Statistics (Charts)</a></li>
    <li><a href="tables.php"><i class="glyphicon glyphicon-list"></i> Tables</a></li>
    <li><a href="buttons.php"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
    <li><a href="editors.php"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
    <li><a href="forms.php"><i class="glyphicon glyphicon-tasks"></i> Forms</a></li>
    <li class="submenu">
            <a href="#">
            <i class="glyphicon glyphicon-list"></i> Pages
            <span class="caret pull-right"></span>
            </a>

            <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Signup</a></li>
        </ul>
    </li> -->
</ul>
</div>
