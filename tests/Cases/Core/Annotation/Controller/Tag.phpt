<?php declare(strict_types = 1);

/**
 * Test: Annotation\Controller\Tag
 */

require_once __DIR__ . '/../../../../bootstrap.php';

use Apitte\Core\Annotation\Controller\Tag;
use Doctrine\Common\Annotations\AnnotationException;
use Tester\Assert;

// OK
test(function (): void {
	$tag = new Tag('name', null);

	Assert::same('name', $tag->getName());
	Assert::same(null, $tag->getValue());
});

// Exception - empty name
test(function (): void {
	Assert::exception(function (): void {
		new Tag('', null);
	}, AnnotationException::class, 'Empty @Tag name given');
});
