<?php declare(strict_types = 1);

namespace Apitte\Core\Annotation\Controller;

use Doctrine\Common\Annotations\Annotation\Target;
use Doctrine\Common\Annotations\AnnotationException;

/**
 * @Annotation
 * @Target("METHOD")
 */
final class Negotiations
{

	/** @var Negotiation[] */
	private $negotiations = [];

	/**
	 * @param mixed[] $values
	 */
	public function __construct(array $values)
	{
		if (isset($values['value'])) {
			if (empty($values['value'])) {
				throw new AnnotationException('Empty @Negotiations given');
			}
			$this->negotiations = $values['value'];
		} elseif (isset($values['negotiations'])) {
			if (empty($values['negotiations'])) {
				throw new AnnotationException('Empty @Negotiations given');
			}
			$this->negotiations = $values['negotiations'];
		} else {
			throw new AnnotationException('No @Negotiations given');
		}
	}

	/**
	 * @return Negotiation[]
	 */
	public function getNegotiations(): array
	{
		return $this->negotiations;
	}

}
