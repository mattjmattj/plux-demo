<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Component;

use \Plux\Plux;
use \Plux\Action;

class TodoList extends \Plux\Demo\Framework\Component {
	
	public function render () {
		$items = Plux::getStore('Items')->getData();
		$items = array_reverse ($items, true);
		?>
		<h3>Item list</h3>
		<ul>
		<?php
		foreach ($items as $id => $item) :
		?>
			<li>
				<form method="POST" action="?delete">
					<div class="row">
						<input type="hidden" name="id" value="<?php echo $id;?>" />
						<div class="small-8 columns"><?php echo strip_tags($item); ?></div>
						<div class="small-4 columns"><button type="submit" title="Delete" class="button round alert tiny">Delete</button></div>
					</div>
				</form>
			</li>
		<?php
		endforeach;
		?>
		</ul>
		<?php
	}
	
	public function getRoutes () {
		return ['/?delete' => [$this, 'delete'] ];
	}
	
	public function delete () {
		if (!isset($_POST['id'])) {
			return;
		}
		$action = new Action ('delete', ['id' => $_POST['id']]);
		Plux::getDispatcher()->dispatch($action);
	}
	
}