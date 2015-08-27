# CHANGELOG

## 2.0.6

* Use unknown error exception if an exception contains an unknown error code, instead of crashing

## 2.0.5

* Add missing `deleteStaticSegmentMembers` method.
* 
## 2.0.4

* Add `addStaticListSegment` method

## 2.0.3

* Return in Error handler if no response is set (which happens in case of async calls)

## 2.0.2

* Fix wrong parameter type for get list merge vars [#13](https://github.com/zf-fr/zfr-mailchimp/pull/13)

## 2.0.1

* Fix wrong URL endpoint for list webhooks [#12](https://github.com/zf-fr/zfr-mailchimp/pull/12)
* Fix a bug with AddInterestGrouping method [#11](https://github.com/zf-fr/zfr-mailchimp/pull/11)
* Add missing `AddStaticSegmentMembers` and `ResetStaticSegment` methods [#9](https://github.com/zf-fr/zfr-mailchimp/pull/9)

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
