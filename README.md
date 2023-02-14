Development of a Run-Time Filter Using Laravel and jQuery
Introduction
The purpose of this project is to develop a run-time filter system that enables users to filter data based on different criteria. The system will consist of three major selections and four minor selections, and it will store and update data in real-time without the need for page refresh. Data can be fetched on the same page where the filter is used.

Technology Used
The project will be developed using Laravel, a free and open-source PHP web framework, and jQuery, a fast, small, and feature-rich JavaScript library.

Logical Techniques
The following techniques will be used in the development of the project:

Selection Boxes: Three selection boxes will be created where users can make their selections. After an option is selected from one box, the next box will become visible to the user.
Filter Results: After the user has made their selections in the first three boxes, they will click on the submit button to filter the results and move to the next page.
Further Selections: On the next page, there will be four more selection boxes where users can make additional selections. The options in these boxes will be visible only after the user has made a selection from the first box.
Final Record: After making all the selections, the final record will be visible to the user without the need to click any button, using jQuery's run-time filter.
Data Population: Based on the user's selections, the data will be populated month-wise.
Editable Records: The records will be made editable, and any changes made to the record will be updated in the database in real-time without refreshing the page.
Empty Rows: An empty row will be added at the end of the record that can be used to push new data into the database.
Adding New Rows: A button will be added to add a new empty row. When the user clicks the submit button, all new data will be stored in the database.
Labels of Selections
The first three select sections will have the following labels:

Supplier
Whole Seller
Steering Type
The further four select sections will have the following labels:
Car Model
Car SFX
Car Variant
Color
Data Quantity
The data will be based on the total demand quantity for each of the 12 months from Jan 2023 to Dec 2023. The data will be editable, and each month's total demand quantity can be updated.

Dummy Data
The following dummy data and labels can be used for the development of the project:

Supplier:
Supplier One
Supplier Two
Supplier Three
Whole Seller:
Whole Seller One
Whole Seller Two
Whole Seller Three
Steering Type:
Left Hand Driven (LHD)
Right Hand Driven (RHD)
Car Model:
Model One
Model Two
Car SFX:
A1
B1
Car Variant:
SomeCar_1
SomeCar_2
Color:
Black
White
Blue
onclusion
The project will provide a run-time filter system that allows users to filter data without refreshing the page. The system is developed using Laravel and jQuery, making it efficient, user-friendly, and fast. The system has three major selections and four minor selections that filter the data, and it is
designed in a way that the data is stored and updated in real-time without the need for a page refresh. The user can fetch the data on the same page using jQuery's run-time filter, ensuring a fast and smooth operation.

The system also has a record editing feature, allowing the user to update the data and store it in the database without refreshing the page. Additionally, the system includes a button to add a new empty row, which can be used to push new data into the database. The project uses dummy data related to the car industry, including labels for supplier, wholesaler, steering type, car model, SFX, variant, and color. The data is displayed month-wise, making it easier for the user to track and update the quantity of each month.

In conclusion, the project provides a comprehensive solution for filtering data in real-time and storing and updating it without the need for a page refresh. It makes data management and analysis more efficient and user-friendly.
