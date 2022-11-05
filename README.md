# Minimax api php library

Library is still in development and is limited with features. More features will be added in the future.

## Summary
1. [Installation](#installation)
2. [Examples of use](#examples-of-use)
3. [Licence](#licence)


## Installation
You can install library with composer:
```
composer require rolecode/php-minimax
```


## Examples of use

### Basic setup
```
    // Create minimax instance.
    $minimax = new MinimaxClient( "YOUR_MINIMAX_CLIENT_ID", "YOUR_MINIMAX_CLIENT_PASSWORD", "YOUR_MINIMAX_USER_NAME", "YOUR_MINIMAX_USER_PASSWORD" );

    // Retrieve organisations. 
    $organisations =  $minimax->organisations->all();

    // Organisation must be set before performing other calls. 
    $minimax->setOrganisationId( "YOUR_ORGANISATION_ID" );
```

### Document numbering
```
    $documentNumberingsAll = $minimax->documentNumberings->all();
    $documentNumberingId = $documentNumberings[0]->DocumentNumberingId;
    $documentNumberingRetrievedById = $minimax->documentNumberings->retrieve( $documentNumberingId );
```

### Employees
```
    $allEmployees = $minimax->employees->all();
    $employeeId = $employees[0]->EmployeeId;
    $employeeRetrievedById = $minimax->employees->retrieve( $employeeId );
```

### Report templates
```
    // List of request params: https://moj.minimax.si/SI/API/Help/Api/GET-api-orgs-organisationId-report-templates
    $reportTemplatesAll = $minimax->reportTemplates->all( ['SearchString' => 'IR'] );
    $reportTemplateId = $reportTemplates[0]->ReportTemplateId;
    $reportTemplateRetrievedById = $minimax->reportTemplates->retrieve( $reportTemplateId );
```

### Employees
```
    $employeesAll = $minimax->employees->all();
    $employeeId = $employees[0]->EmployeeId;
    $employeeRetrievedById = $minimax->employees->retrieve( $employeeId );
```

### Items
```
    $items = $minimax->items->all( ['SearchString' => '111'] );
    $itemRetrievedById = $minimax->items->retrieveById( "INSERT_ID" );
    $itemRetrievedByCode = $minimax->items->retrieveByCode( "INSERT_CODE" );
    
    // Prepare item and create it.
    $item = new Item();
    $item->Name = "Example item.";
    $item->Code = 1;
    $item->ItemType = ItemType::GOOD;
    $item->VatRate = new mMApiFkField( 36 );
    $item->Currency = new mMApiFkField( 7 );
    $createdItem = $minimax->items->create( $item );
    
    // Update item.
    $item = $minimax->items->retrieveById( "INSERT_ID" );
    $item->Name = "New item name";
    $updatedItem = $minimax->items->update( $item );

    // Delete item.
    $minimax->items->delete( "ID" );
```

### Vatrates
```
    $vatRates = $minimax->vatRates->all();
    $vatRateStandard = $minimax->vatRates->retrieveByCode( VatRateCode::STANDARD );
```

### Issued invoice
```
    $invoicesAll = $minimax->issuedInvoices->all();
    $invoiceRetrievedById = $minimax->issuedInvoices->retrieveById( "INSERT_ID" );

    // Create invoice.
    // First prepare invoice rows.
    $invoiceRows = [];
    $row = new IssuedInvoiceRow();
    $row->RowNumber = 1;
    $row->Item = new mMApiFkField( "INSERT_ITEM_ID" );
    $row->Quantity = 1;
    $row->Price = 1;
    $row->PriceWithVAT = 1.22;
    $row->Value = $row->PriceWithVAT;
    $row->VatRate = new mMApiFkField( $vatRateStandard->VatRateId );
    $row->VATPercent = $vatRateStandard->Percent;
    $invoiceRows[] = $row;


    // Prepare invoice payments.
    $invoicePayments = [];
    $row = new IssuedInvoicePaymentMethod();
    $row->PaymentMethod = new mMApiFkField( $paymentMethod->PaymentMethodId );
    $row->AlreadyPaid = "D";
    $invoicePayments[] = $row;

    // Prepare invoice object.
    $invoice = new IssuedInvoice();
    $invoice->InvoiceType = "R";
    $invoice->Customer = new mMApiFkField( $customer->CustomerId );
    $invoice->DateIssued = date( Date::DATE_FORMAT );
    $invoice->DateTransactionFrom = $invoice->DateIssued;
    $invoice->DateTransaction = $invoice->DateIssued;
    $invoice->DateDue = date( Date::DATE_FORMAT )( Date::DATE_FORMAT );
    $invoice->IssuedInvoiceRows = $invoiceRows;
    $invoice->IssuedInvoicePaymentMethods = $invoicePayments;

    // Create invoice.
    $invoice = $minimax->issuedInvoices->create( $invoice );

    // Issue and generate pdf for invoice.
    $invoice = $minimax->issuedInvoices->performAction( $invoice->IssuedInvoiceId, $invoice->RowVersion, "issueAndGeneratepdf" );

    // Retrieve invoice document pdf.
    $documentId = $invoice->Document->ID;
    $documentAttachmentId = $invoice->InvoiceAttachment->ID;
    $documentAttachment = $minimax->documentAttachments->retrieve( $documentId, $documentAttachmentId );

   // Save file to disk.
    file_put_contents($documentAttachment->FileName, $documentAttachment->getDecodedAttachmentData());
```

## Licence
Library is made available under the MIT License (MIT). Please see License File for more information.

