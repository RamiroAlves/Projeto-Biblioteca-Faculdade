<?php
interface InterfaceCRUD{
    public function salvar($objeto);
    public function ler($param);
    public function atualizar($objeto);
    public function apagar($param);
}
?>