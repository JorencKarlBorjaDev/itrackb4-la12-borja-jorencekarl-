Laboratory Activity 6 - Two Filters, One Route

1. I did not add a new route for the second filter because the filters use query strings. The router only looks at the URL path, so both the genre and year filters can use the same /books route. This also lets me use one filter or both filters at the same time.

2. If I used route parameters instead, the filter value would be part of the URL path. For example, a year-only filter could look like /books/year/1861. If I also wanted to filter by genre, I would need another route pattern for it. This is why query strings are used for the filters in this activity.

3. The navigation link on the detail page still works because it uses the existing book route. The filter links also use the same /books route and only add the filter values to the URL. Because of this, I did not need to add another route for the filters.

4. I deleted the old filter method because the filtering is now handled inside the index method. The store and update methods were kept even though they do not have routes. They are still empty methods in the controller, while the old filter method was no longer needed.

Lab Activity 7

1. If I use GET, the data will show in the URL. When I refresh the page, the browser may send the same request again and add the book again.

2. Laravel automatically stops the process when the validation fails. It sends me back to the form with the errors, so the book is not saved.

3. The success message only appears once because it is stored in the session temporarily. After refreshing or going to another page, the message disappears.

Lab Activity 9

F1. Which column did you make nullable, and why that one and not another?

I made the `genre` column nullable because some books might not have a genre assigned yet. I chose that column because the book can still be saved even if its genre is unknown, while the title and author are important information about the book.

F2. Which step failed first for you, and what did the error say?

The first error I encountered happened when I tried to create a book using Tinker without providing all the required fields. It showed a `NOT NULL constraint failed: books.author` error because I did not provide an author value. Later, I also encountered a mass-assignment error before adding the fields to the `$fillable` property.

F3. You changed no Blade file in Part D, yet your pages still work. Why not?

My Blade files still work because I kept the same view names and variables that the pages already use. I only changed the controller to retrieve the books from the database using the `Book` model instead of reading from the old JSON file.

Lab Activity 10

G1. I turned the Genre column into a separate table to avoid repeating genre names and keep the data organized.

G2. Screenshot 6 showed 7 queries because there were 6 books, each requiring a separate genre query, plus 1 query to retrieve the books.

G3. If I made `genre` plural, Laravel would not find the relationship when my code uses `genre`.

Lab 11

G1. In my project, route model binding needs the route parameter name to match the controller variable and the model to be properly set up. If only one is correct, Laravel may not find the correct book record, and it can return a 404 error.

G2. When I first clicked the Delete link, it opened the Book Information page instead of deleting the book because an HTML link only sends a GET request. My destroy route requires a DELETE request, so I needed to replace the link with a form using `@method('DELETE')`.

G3. In my edit form, I used `old()` with a second argument so the existing book information would still appear when I opened the form. Without the second argument, the fields could become empty, while using only the second argument would not show the new input if validation failed.

Lab 12
H1. The error page showed a file inside the vendor folder because Laravel detected the error while handling my code. My actual mistake was in my `BookController.php`, where I accidentally used `withh()` instead of `with()`. I found the wrong line in the Exception Trace.

H2. My `Log::info()` line helps me check which book was saved by showing its actual ID. Even next month, I can look at `laravel.log` to know which book was added, something the error page cannot tell me.

H3. Using 403 is better when I want to completely prevent an action, like deleting the last book in a genre. Redirecting back with a message is better when the user can still continue using the page and just needs to know why the action was not completed.
