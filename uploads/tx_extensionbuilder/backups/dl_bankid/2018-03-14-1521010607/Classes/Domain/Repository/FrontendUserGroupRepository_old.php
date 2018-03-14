<?php
namespace DanLundgren\DlBankid\Domain\Repository;
/***
 *
 * This file is part of the "BankID" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Dan Lundgren <danlundgren0@gmail.com>, Dan Lundgren
 *
 ***/

class FrontendUserGroupRepository extends \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository {
    /**
     * @param $listOfUids
     */
    public function findByUidInList($listOfUids)
    {

        if (is_array($listOfUids) && count($listOfUids) > 0) {
            $query = $this->createQuery();
            $query->matching($query->in('uid', $listOfUids));
            $result = $query->execute();
\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(
 array(
  'class' => __CLASS__,
  'function' => __FUNCTION__,
  'result' => $result,
 )
);
            return $result;
        }
    }
}