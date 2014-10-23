<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Component;

use \Plux\Plux;
use \Plux\Action;

class Log extends \Plux\Demo\Framework\Component {
	
	public function render () {
		$items = Plux::getStore('ActionLog')->getData();
		$items = array_reverse ($items, true);
		?>
		<h3>Action log</h3>
		<div class="row">
			<form action="?clearlog" method="POST">
				<button type="submit" title="Clear log" class="rounded alert tiny button">Clear log</button>
			</form>
		</div>
		<table>
		<?php
		foreach ($items as $id => $item) :
		?>
			<tr>
				<td><?php echo strip_tags($item); ?></td>
			</tr>
		<?php
		endforeach;
		?>
		</table>
		<?php
	}
	

	public function getRoutes () {
		return ['/?clearlog' => [$this, 'clearlog'] ];
	}
	
	public function clearlog () {
		$action = new Action ('clearlog');
		Plux::getDispatcher()->dispatch($action);
	}
}