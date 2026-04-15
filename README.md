# Notification Rule Engine

A Laravel-based smart notification system that automatically sends notifications to users when predefined conditions are met.

This project allows administrators to create dynamic notification rules based on triggers such as:

- User messages containing specific keywords
- User actions performed
- Specific dates/time reached
- User roles or permissions

When a user performs an action or submits input, the system evaluates all matching rules and automatically triggers the appropriate notification.

## Features

- Full CRUD for notification rules
- Dynamic trigger evaluation engine
- Condition-based matching logic
- User action tracking system
- Notification history logging
- Priority handling for multiple matching rules
- Extensible architecture for adding new trigger types

## Example Use Cases

- User writes: "I need help with payment"  
  → System sends: "Check our billing FAQ."

- User clicks: "Contact Support"  
  → System sends: "A support ticket has been created."

## Tech Stack

- Laravel
- MySQL
- Blade / Tailwind CSS
- Event / Listener Architecture

## Purpose

Built to demonstrate backend architecture, automation workflows, event-driven programming, and dynamic rule evaluation beyond basic CRUD applications.
