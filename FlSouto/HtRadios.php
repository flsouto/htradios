<?php

namespace FlSouto;

class HtRadios extends HtChoice{

	protected $separator = '<br/>';

	function separator($separator){
		$this->separator = $separator;
		return $this;
	}

	function renderReadonly(){
		$attrs = new HtAttrs([
			'type' => 'hidden',
			'name' => $this->name(),
			'value' => $this->value()
		]);
		$this->readonly = true;
		$this->renderWritable();
	}

	function renderWritable(){

		$this->resolveOptions();
		$value = $this->value();
		echo "\n";
		foreach($this->options as $value2 => $label){
			echo "<label>";
			$attrs = new HtAttrs([
				'type' => 'radio',
				'name' => $this->name(),
				'value' => $value2
			]);
			if($this->compareOptionsValues($value2,$value)){
				$attrs['checked'] = 'checked';
			}
			if($this->readonly){
				$attrs['disabled'] = 'disabled';
			}
			echo "<input $attrs />";
			echo $label;
			echo "</label>";
			echo $this->separator;
			echo "\n";
		}
	}

}