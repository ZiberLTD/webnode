<?php

namespace Ethereum;

//use Math_BigInteger;

/**
 * Boolean data.
 */
class EthB extends EthQ {

  /**
   * Implement validation.
   *
   * @param string|number $val
   *   "0x"prefixed hexadecimal or number value.
   * @param array $params
   *   Only $param['abi'] is relevant.
   *
   * @throws \Exception
   *   If things are wrong.
   *
   * @return Math_BigInteger.
   *   Math_BigInteger value.
   */
  public function validate($val, array $params) {
    $params['abi'] = 'uint8';

    if (is_bool($val)) {
      $val = (int) $val;
    }

    $big_int = parent::validate($val, $params = array('abi' => 'uint8'));
    $int = (int) $big_int->toString();
    if (!($int === 1 || $int === 0)) {
      throw new \InvalidArgumentException('Can not decode boolean value : ' . $val);
    }
    $this->abi = 'bool';
    return $big_int;
  }

  /**
   * Implement Integer value.
   *
   * @return bool
   *   Return a PHP boolean value.
   */
  public function val() {
    return (bool) $this->value->toString();
  }

}
