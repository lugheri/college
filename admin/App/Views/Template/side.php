<div class="sidebar">
    <div class="brand">
        <a href="<?= BASE_URL?>">
            <img src="<?= PUBLIC_PATH?>img/comunidade_branco.png" alt="logo"/>
        </a>
    </div>
    <div class="sidebar-body">
        <ul class="side-nav">
            <?php if(!empty($modulos)):
                foreach($modulos as $m):
                    $telas = $this->telasModulo($m['id']);
                    //verifica se o modulo atual esta ativo e muda a classe
                    if($moduloAtivo==$m['modulo']){
                       $class_a_side='side-nav-link active';
                       $styleSubside='style="height:auto;"';
                    }else{
                        $class_a_side='side-nav-link';
                        $styleSubside='';
                    }
                    if(empty($telas)):?>
                        <li class="side-nav-item">
                            <a class="<?= $class_a_side?>" href="<?= BASE_URL.$m['modulo']?>">
                                <i class="<?= $m['icone']?>"></i> <?= $m['nome']?>
                            </a>
                        </li>
                    <?php else:?>
                        <li class="side-nav-item">
                            <a class="<?= $class_a_side?>" href="#" onClick="openSubSide(<?= $m['id'] ?>)">
                                <i class="<?= $m['icone']?>"></i> <?= $m['nome']?> <i class="open fas fa-chevron-right" id='openIcon_<?= $m['id']?>'></i>
                            </a>
                            <!--SUB TELAS DO MODULO-->                            
                            <ul class="sub-side-nav" <?= $styleSubside ?> id='subSide_<?= $m['id'] ?>'>
                                <?php foreach($telas as $t):
                                if($telaAtual==$t['tela']){
                                    $class_a_sub_side='side-nav-link active';
                                 }else{
                                     $class_a_sub_side='side-nav-link';
                                 }?>
                                    <li>
                                        <a class="<?= $class_a_sub_side?>" href="<?= BASE_URL.$m['modulo'].'/'.$t['tela']?>">
                                            <?= $t['nome']?>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>                        
                        </li>
                    <?php endif;                   
                endforeach;
            endif;?>            
        </ul>
    </div>
</div>


         <!--   <li>
                <a class="side-nav-link active" href="#" onClick="openSubSide(1)">
                    <i class="fas fa-users"></i> Alunos <i class="open fas fa-chevron-right" id='openIcon_1'></i>
                </a>                
            </li>
            <ul class="sub-side-nav" id='subSide_1'>
                <li><a class="side-nav-link" href="#">Lista de Alunos</a></li>
                <li><a class="side-nav-link" href="#">Gerenciar</a></li>
            </ul>
            <li>
                <a class="side-nav-link" href="#" onClick="openSubSide(2)">
                    <i class="fas fa-chalkboard-teacher"></i> Cursos <i class="open fas fa-chevron-right" id='openIcon_2'></i>
                </a>
            </li>
            <ul class="sub-side-nav" id='subSide_2'>
                <li><a class="side-nav-link" href="#">Lista de Cursos</a></li>
                <li><a class="side-nav-link" href="#">Gerenciar</a></li>
            </ul>-->