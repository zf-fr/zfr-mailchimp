# CHANGELOG

## 2.0.0

* [BC] Guzzle exceptions have been replaced in favour of more meaningful exceptions
* [BC] Remove `Version` class

## 1.2.0

* Added "GetProfile" method (allow to retrieve information about the profile that owns the API key)
* Added "GetListSegments", "AddListSegment", "DeleteListSegment", "UpdateListSegment" and "TestListSegment"

## 1.1.1

* Missing "id" parameter for "UpdateListMember" method.

## 1.1.0

* Remove unused ExceptionInterface. Exceptions are currently not wrapped around a specific ZfrMailChimp exception
* Added getGalleryMethod
* Added some methods for reports: getCampaignAbuseReport, getCampaignAdviceReport, getCampaignBounceMessage,
getCampaignBounceMessages, getCampaignSummaryReport and getCampaignGoogleAnalyticsReport
* Bump Guzzle dependency to 3.5

## 1.0.0

* Add list static segment

## 1.0.0-beta2

* [BC] Change some parameters name in the service description so that there is always an exact 1-to-1 mapping
between the doc and ZfrMailChimp
* Add webhooks methods for lists

## 1.0.0-beta1

* Initial release
