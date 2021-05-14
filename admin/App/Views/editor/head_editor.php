<style>
    /*editor de texto*/
.boxMarcar{
    position: absolute;
    top: 34px;
    left: -40px;
    width: 250px;
    height: 250px;
    background: #fff;
    padding: 5px;
    box-shadow: 0px 0px 5px #666;
    z-index: 100;
    overflow: auto;
}

.paleta-cor{
    background: #f1f1f1;
    width: 20%;
    height: 100px;
    overflow: hidden;
    float: left;
    transition: ease-in .5s;
    cursor: pointer;
    text-align: center;
    line-height: 7;
    border: none;

}

.paleta-cor h5{
    display: none;
    transition: ease-in .5s;
    
}

.paleta-cor:hover{
    box-shadow: 0px 0px 5px #666;
    transform: scale(1.1,1.1);
    transition: ease-in .2s;
     z-index: 99999;
}

.paleta-cor:hover h5{
    display: inline;
    color: #fff;
    font-weight: bold;
    transition: ease-in .2s;
    border:solid #fff 1px;
    border-radius: 6px;
    padding: 5px;
}

.menu-bar{
  background: #f1f1f1;
  border:#ccc solid 1px;
}

.container-box-txt{
  background:#f1f1f1;
  padding: 5PX; 
  min-height: 100px
}

.box-editor{
  min-height: 250px;
  padding: 5px;
  background: #fff;
}



</style>

