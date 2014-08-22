<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
__IncludeLang(dirname(__FILE__).'/lang/'.LANGUAGE_ID.'/'.basename(__FILE__));
$curPage = $GLOBALS['APPLICATION']->GetCurPage($get_index_page=false);
if ($curPage != SITE_DIR)
{
   if (empty($arResult) || $curPage != $arResult[count($arResult)-1]['LINK'])
      $arResult[] = array('TITLE' =>  htmlspecialcharsback($GLOBALS['APPLICATION']->GetTitle(false, true)), 'LINK' => $curPage);
}
if(empty($arResult))
   return "";
$strReturn = '<div class="nav-chain"><ul id="breadcrumbs-three"><li><a title="'.GetMessage('BREADCRUMB_MAIN').'" href="'.SITE_DIR.'">Главная</a><li>';
for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
   // $strReturn .= ' <span class="Del">&raquo;</span> '; // Если нужен разделитель

   $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
   
   if($arResult[$index]["LINK"] <> ""&&$index<(count($arResult)-2))
      $strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
   else
      $title = (strlen($title) > 60) ? substr($title,0,60).'...' : $title;
      $strReturn .= '<li><p>'.$title.'</p></li>';
}
$strReturn .= '</ul></div>';
return $strReturn;
?>