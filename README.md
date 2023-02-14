**Document: Development of a Run-Time Filter System**

**Introduction:**
This document outlines the design and development of a run-time filter system based on dropdowns. The system is developed using Laravel and jQuery, making it efficient, user-friendly, and fast. The system has three major selections and four minor selections that filter the data, and it is implemented in such a way that it updates and stores the data at the same time without refreshing the page.

**Design and Development:**
The system is designed in a way that allows users to filter data by selecting options from three major selection boxes, which include Supplier, Whole Seller, and Steering type. After selecting the options, the user will click on the submit button to filter the results and move on to the next page.

On the next page, there will be four more selection boxes to filter the data, which include Car Model, Car SFX, Car Variant, and Color. The final record will be visible to the user without clicking any button, as it is implemented using jQuery's runtime filter.

The data is populated below month-wise, based on all the filters, and the record is made editable. This allows the user to update the database with new records without refreshing the page.

At the end of the record, there is an empty row that can be used to add new data to the database. There is also a button that can be used to add a new empty row, and when the user clicks on the submit button, all the new data will be stored in the database.

The data is organized by 12 months, from January 2023 to December 2023, which includes the total demand quantity for each month.

**Technical Details:**
The system is developed using Laravel and jQuery. Laravel is a free, open-source PHP web framework used for web application development, while jQuery is a fast, small, and feature-rich JavaScript library that makes HTML document traversal and manipulation, event handling, and animation much simpler with an easy-to-use API that works across a multitude of browsers.

The system uses logical techniques such as event handling, dynamic data fetching, and DOM manipulation to implement the runtime filter and update the data without refreshing the page.

**Conclusion:**
In conclusion, the project has provided a run-time filter system that allows users to filter data without refreshing the page. The system is efficient, user-friendly, and fast, and it is developed using Laravel and jQuery. The system has three major selections and four minor selections that filter the data, and it is implemented in such a way that it updates and stores the data at the same time without refreshing the page.
