<?php namespace App\Services;

class View
{
	/**
	* Generate view
	*/
	public static function make($filename, $variables = [])
	{
		$path = 'App/Views/' . $filename . '.php';

		// Grab view file
		$content = file_get_contents($path);

		// Convert blade-ish tags
		$content = self::convertView($content);

		// Load variables
		foreach($variables as $variable => $value)
		{
			$$variable = $value;
		}

		// Render page
		eval('namespace App\Services; ?>' . $content);

		return true;
	}

	/**
	* Convert blade-ish tags
	*/
	private static function convertView($content)
	{
		// Safe output
		$content = str_replace('{{', '<?php echo htmlentities(', $content);
		$content = str_replace('}}', '); ?>', $content);

		// Dangerous output
		$content = str_replace('{!!', '<?php echo ', $content);
		$content = str_replace('!!}', '; ?>', $content);

		return $content;
	}
}