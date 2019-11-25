<?php
class Articulo implements \SplSubject{
	protected $almacen;

	public function __construct(\SplObjectStorage $almacen)
	{
		$this->almacen = $almacen;
	}

	public function siStock()
	{	
		$this->notify('aumentado');
	}

	public function noStock()
	{
		$this->notify('reducido');
	}


	public function attach(\SplObserver $observer)
	{
		$this->almacen->attach($observer);
	}

	public function detach(\SplObserver $observer)
	{
		$this->almacen->detach($observer);
	}

	public function notify($event = '')
	{
		foreach ($this->almacen as $observer)
			$observer->update($this, $event);
	}
}

class Notify implements \SplObserver{

	public function update(\SplSubject $subject,$event = '')
	{
		if ($event == 'aumentado') {
			echo "Existe STOCK del producto. ENVIAR CORREO";
		}
		else if ($event == 'reducido') {
			echo "NO hay stock del producto seleccionado.";
		}
	}
//YO PONDRIA OTRO BOTON PARA CONSULTAR EL STOCK QUE HAY DE UN PRODUCTO
}

?>