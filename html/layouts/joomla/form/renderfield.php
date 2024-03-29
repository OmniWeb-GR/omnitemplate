<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2014 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;

extract($displayData);

/**
 * Layout variables
 * -----------------
 * @var   array   $options      Optional parameters
 * @var   string  $name         The id of the input this label is for
 * @var   string  $label        The html code for the label
 * @var   string  $input        The input field html code
 * @var   string  $description  An optional description to use in a tooltip
 */

if (!empty($options['showonEnabled']))
{
	/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
	$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
	$wa->useScript('showon');
}

$class           = empty($options['class']) ? '' : ' ' . $options['class'];
$rel             = empty($options['rel']) ? '' : ' ' . $options['rel'];
$id              = $name . '-desc';
$hideLabel       = !empty($options['hiddenLabel']);
$hideDescription = empty($options['hiddenDescription']) ? false : $options['hiddenDescription'];

if (!empty($parentclass))
{
	$class .= ' ' . $parentclass;
}

?>
<div class="form-floating mb-3<?php echo $class; ?>"<?php echo $rel; ?>>
	<?php echo $input; ?>
	<?php if ($hideLabel) : ?>
		<div class="visually-hidden"><?php echo $label; ?></div>
	<?php else : ?>
		<?php echo $label; ?>
	<?php endif; ?>
	<?php if (!$hideDescription && !empty($description)) : ?>
		<div id="<?php echo $id; ?>">
			<small class="form-text">
				<?php echo $description; ?>
			</small>
		</div>
	<?php endif; ?>
</div>
