<?php
$author->update($request->all());
        return redirect()->route('authors.index')->with('success','Author updated successfully');