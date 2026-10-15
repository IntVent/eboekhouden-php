# Changelog

All notable changes to `eboekhouden-php` will be documented in this file.

## 3.0.0 - 2026-10-15
- Renamed the public `CostPlacement` terminology to `CostCenter`, including the client method, filter, model, and related accessors

## 2.1.0 - 2023-07-19
- Made the `EboekhoudenRelation` model arrayable
- Removed the `: void` return type from `Client::createSoapClient()` for PHP 8.1+ support

## 1.0.1 - 2020-12-30
- Added method `addMutation` to add mutations

## 1.0.0 - 2020-08-01

- initial release
- autoLogin
- getAdministrations
- getCostPlacements
- getArticles
- getRelations
- getOutstandingPosts
- getLedgers
- getSaldo
- getInvoices
- getMutations
- addInvoice
- addLedger
- updateLedger
- addRelation
- updateRelation
