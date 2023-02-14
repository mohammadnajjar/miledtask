Here is a skill test for you to develop a web page using the latest technologies of web development. To complete this task, you need to have strong knowledge of web development, logic building, and database designing. Questions can be asked about the technicalities you will face in this task. Details about what you need to develop are mentioned below. 

**(You can use PHP or any framework of PHP. You are not allowed to use any content management system).**

**Scenario:**
**
`	`You need to design and develop a run-time filter based on dropdowns, must have 3 major selections and 4 minor selections, and then store and update the data at the same time without refreshing the page and need to fetch that record on the same page.

**Note:** Dummy data will be provided.

`	`Let me explain its behavior to you in steps.

1. First, you need to create 3 Selection boxes from where the user will select one after another and can see the next after the selection of the first one.
1. After selecting all 3, the User will click on submit button to filter the results and move on to the next page.
1. On the next page, there will be 4 more Selection areas to filter the data.
1. Like the above scenario when you select an option from the first one the other options will be visible to you.
1. After selecting all the options, the final record will be visible to you without clicking any button. (jQuery’s Runtime Filter)
1. On the base of all these filters, the data will be populated below month-wise.
1. You should have made the record editable which will update the database with the new record without refreshing the page.
1. At the end of the record, you need to add an empty row which will be used to push data into the database.
1. There will be a button that could be used to add a new empty row.
1. When the user clicks on the submit button all the new data will be stored in the database.

The label of the first three select sections are:

1. Supplier
1. Whole Seller
1. Steering type

The further four select sections are:

1. Car Model
1. Car SFX
1. Car Variant
1. Color

The further data Quantity will be based on 12 months, which will be editable. Each month’s total demand Quantity.

From Jan 2023 to Dec 2023.

Here is the dummy data and the labels that you can use.


|**Supplier**|**Whole Seller**|**Steering Type**|
| :-: | :-: | :-: |
|Supplier One|Whole Seller One|Left Hand Driven (LHD)|
|Supplier Two|Whole Seller Two|Right Hand Driven (RHD)|
|Supplier Three|Whole Seller Three||




|**Model**|**SFX**|**Variant**|**Color**|
| :-: | :-: | :-: | :-: |
|Model One|A1|SomeCar\_1|Black|
|Model One|B1|SomeCar\_2|White|
|Model Two|A1|SomeCar\_1|Blue|




|**Jan 23**|**Feb 23**|**Mar 23**|**Apr 23**|**May 23**|**Jun 23**|**Jul 23**|**Aug 23**|**Sep 23**|**Oct 23**|**Nov 23**|**Dec 23**|
| :-: | :-: | :-: | :-: | :-: | :-: | :-: | :-: | :-: | :-: | :-: | :-: |
|10|5|10|20|15|0|5|12|15|18|20|14|
|6|5|0|8|9|10|12|0|16|18|10|10|
|6|7|8|2|9|0|12|0|14|10|0|12|


**Important: You need to provide the source code with a database file and need to write down a document about your work, like what tech you use and what logical techniques you use in the development, you should create a public git repository to push your folder there and share the link with us.**
